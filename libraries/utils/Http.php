<?php
namespace Utils;
class Http
{
        /**
     * Redirige l'utilisateur
     */
    public static function redirect(string $url): void
    {
        header("Location: $url");
        exit();
    }
}
?>