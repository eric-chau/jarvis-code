<?php

declare(strict_types=1);

namespace JarvisCode;

/**
 * @author Eric Chau <eriic.chau@gmail.com>
 */
class SettingsLoader
{
    /**
     * Returns an array that contains current project global settings.
     *
     * @return array
     */
    public static function load(): array
    {
        $raw = str_replace(
            array_keys(self::vars()),
            array_values(self::vars()),
            file_get_contents(self::settingsPath())
        );

        return json_decode($raw, true);
    }

    /**
     * Returns project root directory.
     *
     * @return string
     */
    protected static function rootdir(): string
    {
        return realpath(__DIR__ . '/../');
    }

    /**
     * Returns project global settings file path.
     *
     * @return string
     */
    protected static function settingsPath(): string
    {
        return realpath(self::rootdir() . '/res/app_settings.json');
    }

    /**
     * Returns list of variables to replace in global settings raw string.
     *
     * @return array
     */
    protected static function vars(): array
    {
        return [
            '%root_dir%' => self::rootdir(),
        ];
    }
}
