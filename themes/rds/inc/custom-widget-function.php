<?php
trait FileVariations {
    protected function getFileVariations($folderName) {
        $parent_theme_path = get_template_directory() . '/global-templates/' . $folderName . '/';
        $child_theme_path = get_stylesheet_directory() . '/global-templates/' . $folderName . '/';

        $parent_files = glob($parent_theme_path . '*.php');
        $child_files = glob($child_theme_path . '*.php');

        $all_files = array_merge($parent_files, $child_files);

        if ($all_files && count($all_files) > 0) {
            $fileVariation = [];
            foreach ($all_files as $file) {
                $fileName = explode('.', basename($file))[0];
                $cleanedString = preg_replace('/[^a-zA-Z\s]/', ' ', $fileName);
                $fileVariation[$fileName] = strtoupper($cleanedString);
            }
            return $fileVariation;
        } else {
            return [];
        }
    }
}

trait AssetVariations {
    protected function getAssetVariations($basePath, $subFolder) {
        $childThemePath = get_stylesheet_directory() . '/img/' . $subFolder . '/';
        $landingFolders = glob($childThemePath . '*', GLOB_ONLYDIR);
        $assetPath = $childThemePath;
        $customFolderPattern = 'landing-*';
        $landingFolders = glob($assetPath . '*', GLOB_ONLYDIR);

        if ($landingFolders && count($landingFolders) > 0) {
            $assetVariation = [];
            foreach ($landingFolders as $folder) {
                $folderName = basename($folder);
                $cleanedString = preg_replace('/[^a-zA-Z\s]/', ' ', $folderName);
                $assetVariation[$folderName] = strtoupper($cleanedString);
            }
            return $assetVariation;
        } else {
            return [];
        }
    }
}