<?php
namespace HMCC\Repository\Gallery;

/**
 * Finds a unique slug
 */
trait FindBestSlugTrait
{
    public function getUniqueSlug($slug)
    {
        $found = false;
        $count = 0;
        $proposedSlug = '';
        while (!$found) {
            try {
                $proposedSlug = $slug;
                if ($count > 0) {
                    $proposedSlug .= '-' . $count;
                }
                $this->bySlug($proposedSlug);
                $count++;
            } catch (\Exception $e) {
                $found = true;
            }
        }
        return $proposedSlug;
    }
}
