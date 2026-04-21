<x-app-layout>
<style>
@media print {
    #receipt-container {
        max-width: 100% !important;
        margin: 0 !important;
        padding: 20px !important;
        border-radius: 0 !important;
        box-shadow: none !important;
    }
    
    table {
        page-break-inside: avoid;
    }
    
    .no-print {
        display: none !important;
    }
}
</style>

<div class="mt-6 mb-4 text-center no-print">
    <button onclick="window.history.back()" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded shadow">
        &larr; Back to Invoices
    </button>
    <button id="downloadPdfBtn" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded shadow ml-2">Download PDF</button>
</div>
<div id="receipt-container" class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-8 mt-8 mb-8">

    <div class="mb-4 flex items-center justify-between gap-4">
        <!-- Logo: Top Left -->
        <div class="flex-shrink-0 flex items-center">
            {{-- <img src="{{ asset('images/logo.jpg') }}" alt="Padmasiri Auto ElectricalsLogo" class="mr-4 rounded-full" style="height: 80px; width: 80px; object-fit: cover;"> --}}
            {{-- <img src="{{ config('app.url') . '/images/logo.jpg' }}" alt="Padmasiri Auto ElectricalsLogo" class="mr-4 rounded-full" style="height: 80px; width: 80px; object-fit: cover;"> --}}
            @php
                $logoPath = public_path('images/logo.jpg');
                $logoBase64 = base64_encode(file_get_contents($logoPath));
            @endphp
            <img src="data:image/jpeg;base64,{{ $logoBase64 }}" alt="Padmasiri Auto ElectricalsLogo" style="height:80px;width:80px;object-fit:cover;">

        </div>
        <!-- Address: Centered -->
        <div class="flex-1 flex flex-col items-center justify-center">
            <div class="text-center mb-2">
                <p class="font-bold text-lg text-gray-800 uppercase">Padmasiri Auto Electricals</p>
                <p class="text-gray-600 uppercase">KUDAMADUWA ROAD</p>
                <p class="text-gray-600 uppercase">MATHTHEGODA</p>
                <p class="text-gray-600 uppercase">0786128263</p>
            </div>
        </div>
        <!-- INVOICE: Top Right -->
        <div class="flex-shrink-0 text-right min-w-[120px]">
            <span class="font-extrabold text-2xl text-black tracking-widest">INVOICE</span>
        </div>
    </div>
    
    <div class="mb-6 mt-2">
        <hr class="border-t border-gray-300 my-4 mb-6">
        <div class="flex flex-col md:flex-row gap-12">
            <!-- Left column: Invoice info -->
            <div class="flex-1">
                <div class="flex justify-between mb-1">
                    <span class="font-semibold text-gray-800">Invoice ID:</span>
                    <span >{{ $invoice->id }}</span>
                </div>
                <div class="flex justify-between mb-1">
                    <span class="font-semibold text-gray-800">Date:</span>
                    <span>{{ $invoice->date }}</span>
                </div>
                <div class="flex justify-between mb-1">
                    <span class="font-semibold text-gray-800">Status:</span>
                    <span>
                        @if(isset($invoice->status))
                            <span class="px-2 py-1 rounded 
                                @if($invoice->status === 'paid') bg-green-100 text-green-700
                                @elseif($invoice->status === 'pending') bg-yellow-100 text-yellow-700
                                @elseif($invoice->status === 'cancelled') bg-red-100 text-red-700
                                @else bg-gray-100 text-gray-700 @endif">
                                {{ ucfirst($invoice->status) }}
                            </span>
                        @else
                            <span class="text-gray-500">-</span>
                        @endif
                    </span>
                </div>
            </div>
            <!-- Right column: Customer info -->
            <div class="flex-1">
                <div class="flex justify-between mb-1">
                    <span class="font-semibold text-gray-800">Customer:</span>
                    <span>{{ $invoice->user->name ?? '-' }}</span>
                </div>
                <div class="flex justify-between mb-1">
                    <span class="font-semibold text-gray-800">Vehicle:</span>
                    <span>{{ $invoice->vehicle_number }}</span>
                </div>
                <div class="flex justify-between mb-1">
                    <span class="font-semibold text-gray-800">Mileage:</span>
                    <span>{{ $invoice->mileage }} km</span>
                </div>
            </div>
        </div>
    </div>
    <table class="w-full mb-6 border">
        <thead>
            <tr style="background-color: #FEF9C3;">
                <th class="p-2 text-left">Description</th>
                <th class="p-2 text-right">Qty</th>
                <th class="p-2 text-right">Price</th>
                <th class="p-2 text-right">Ammount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->items as $item)
                <tr>
                    <td class="p-2 text-gray-600">{{ $item->type === 'part' ? ($item->product->name ?? '-') : $item->service_name }}</td>
                    <td class="p-2 text-gray-600 text-right">{{ $item->quantity }}</td>
                    <td class="p-2 text-gray-600 text-right">{{ number_format($item->price, 2) }}</td>
                    <td class="p-2 text-gray-600 text-right">{{ number_format($item->total, 2) }}</td>
                </tr>
                @if (!$loop->last)
                    <tr>
                        <td colspan="4"><hr class="border-t border-gray-300"></td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-end mb-6">
        <div class="text-right">
            <div class="flex justify-between gap-8">
                <span class="font-semibold text-gray-600">Subtotal:</span>
                <span>{{ number_format($invoice->subtotal, 2) }}</span>
            </div>
            <div class="flex justify-between gap-8">
                <span class="font-semibold text-gray-600">VAT:</span>
                <span>{{ number_format($invoice->vat_amount, 2) }}</span>
            </div>
            <div >
                <hr class="border-t-2 border-gray-400">
            </div>
            <div class="flex justify-between gap-8 text-lg font-bold mt-2">
                <span>Total:</span>
                <span>{{ number_format($invoice->total, 2) }}</span>
            </div>
            <div >
                <hr class="border-t-2 border-gray-400 mb-1">
                <hr class="border-t-2 border-gray-400">
            </div>
        </div>
    </div>
    @if(!empty($invoice->notes))
        <div class="mt-8 border border-gray-300 p-2 rounded mb-8">
            <h2 class="text-lg font-semibold mb-2">Notes</h2>
            <p class="text-gray-600 italic">{{ $invoice->notes }}</p>
        </div>
    @endif
    <div class="flex justify-between mt-12">
        <div class="text-center">
            <p class="mb-4 font-semibold text-white">For, Padmasiri Auto Electricals</p>
            <div class="mt-8 border-t border-dashed border-gray-400 w-48 mx-auto "></div>
            <p class="font-medium text-gray-600">Customer Signature</p>
        </div>
        <div class="text-center">
            <p class="mb-4 font-semibold text-gray-700">For, Padmasiri Auto Electricals</p>
            <div class="mt-8 border-t border-dashed border-gray-400 w-48 mx-auto"></div>
            <p class="font-medium text-gray-600">Authorized Signature</p>
        </div>
    </div>
    <div class="mt-8">
        <h2 class="text-md font-semibold mb-2 mt-6">Bank Details</h2>
        <p><span class="font-medium text-gray-600">Account Number:</span> 119200150013582</p>
        <p><span class="font-medium text-gray-600">Bank:</span> People Bank</p>
        <p><span class="font-medium text-gray-600">Branch:</span> Narahenpita</p>
        <p><span class="font-medium text-gray-600">Account Holder:</span> Tharusha Dayananda</p>
    </div>
</div>

<!-- Add html2pdf.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Get the download button
    const downloadBtn = document.getElementById('downloadPdfBtn');
    
    // Add click event to download button
    downloadBtn.addEventListener('click', function () {
        // Show loading state
        downloadBtn.textContent = 'Generating PDF...';
        downloadBtn.disabled = true;
        
        // Get the receipt container
        const receiptElement = document.getElementById('receipt-container');
        
        // Clone the receipt element to avoid modifications to the original
        const receiptClone = receiptElement.cloneNode(true);
        
        // Apply specific PDF styles
        receiptClone.style.maxWidth = 'none';
        receiptClone.style.margin = '0';
        receiptClone.style.borderRadius = '0';
        receiptClone.style.boxShadow = 'none';
        
        // Set options for html2pdf
        const options = {
            margin: [10, 10, 10, 10],
            filename: 'receipt-{{ $invoice->id }}.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { 
                scale: 2, 
                useCORS: true,
                letterRendering: true,
                logging: false
            },
            jsPDF: { 
                unit: 'mm', 
                format: 'a4', 
                orientation: 'portrait',
                compress: true
            }
        };
        
        // Generate PDF
        html2pdf()
            .from(receiptClone)
            .set(options)
            .save()
            .then(function() {
                // Restore button state after PDF is generated
                downloadBtn.textContent = 'Download PDF';
                downloadBtn.disabled = false;
            })
            .catch(function(error) {
                console.error('Error generating PDF:', error);
                downloadBtn.textContent = 'Error! Try again';
                downloadBtn.disabled = false;
                setTimeout(() => {
                    downloadBtn.textContent = 'Download PDF';
                }, 2000);
            });
    });
});
</script>
</x-app-layout>
