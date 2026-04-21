<?php

namespace App\Observers;

use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceObserver
{
    /**
     * Handle the Service "saved" event (fires after create/update).
     */
    public function saved(Service $service): void
    {
        // Only process if there's an image
        if (!$service->image) {
            return;
        }

        // Get the full path to the image
        $path = Storage::disk('public')->path($service->image);

        // Check if file exists
        if (!file_exists($path)) {
            return;
        }

        // Get current file size (in MB)
        $fileSizeInMB = filesize($path) / 1024 / 1024;

        // Target max size in MB
        $targetSizeInMB = 2;

        // Only compress if file is larger than target
        if ($fileSizeInMB <= $targetSizeInMB) {
            return;
        }

        // Compress the image
        $this->compressImage($path, $targetSizeInMB);
    }

    /**
     * Compress image to target size
     */
    private function compressImage(string $path, float $targetSizeInMB): void
    {
        // Get image info
        $imageInfo = getimagesize($path);
        if (!$imageInfo) {
            return;
        }

        $mimeType = $imageInfo['mime'];

        // Load the image based on type
        $image = match($mimeType) {
            'image/jpeg' => imagecreatefromjpeg($path),
            'image/png' => imagecreatefrompng($path),
            'image/gif' => imagecreatefromgif($path),
            'image/webp' => imagecreatefromwebp($path),
            default => null
        };

        if (!$image) {
            return;
        }

        // Start with quality 85 and reduce if needed
        $quality = 85;
        $targetSizeInBytes = $targetSizeInMB * 1024 * 1024;

        // Try compressing with progressively lower quality
        do {
            // Create a temporary file
            $tempPath = $path . '.tmp';

            // Save with current quality
            if ($mimeType === 'image/jpeg') {
                imagejpeg($image, $tempPath, $quality);
            } elseif ($mimeType === 'image/png') {
                // PNG uses compression level 0-9 (inverse of quality)
                $pngCompression = (int) ((100 - $quality) / 10);
                imagepng($image, $tempPath, $pngCompression);
            } elseif ($mimeType === 'image/webp') {
                imagewebp($image, $tempPath, $quality);
            } else {
                break;
            }

            // Check resulting file size
            $newSize = filesize($tempPath);

            // If we've reached target or quality is too low, stop
            if ($newSize <= $targetSizeInBytes || $quality <= 50) {
                // Replace original with compressed version
                rename($tempPath, $path);
                break;
            }

            // Delete temp file and try again with lower quality
            unlink($tempPath);
            $quality -= 5;

        } while ($quality >= 50);

        // Free memory
        imagedestroy($image);
    }

    /**
     * Handle the Service "deleted" event.
     */
    public function deleted(Service $service): void
    {
        // Delete the image file when service is deleted
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
    }
}
