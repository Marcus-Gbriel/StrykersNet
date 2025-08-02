<?php

/**
 * 
 * Autoloader para carregar classes automaticamente
 * 
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */
class Autoloader
{
    private array $prefixes = [];

    /**
     * Registra o autoloader para carregar classes automaticamente
     *
     * @return void
     * 
     */
    public function register(): void
    {
        spl_autoload_register([$this, 'loadClass']);
    }

    /**
     * Adiciona um namespace e seu diretório base ao autoloader
     *
     * @param string $prefix Namespace prefix a ser adicionado
     * @param string $baseDir Diretório base onde as classes desse namespace estão localizadas
     * @return void
     * 
     */
    public function addNamespace(string $prefix, string $baseDir): void
    {
        $prefix = trim($prefix, '\\') . '\\';
        $baseDir = rtrim($baseDir, DIRECTORY_SEPARATOR) . '/';

        if (!isset($this->prefixes[$prefix])) {
            $this->prefixes[$prefix] = [];
        }

        array_push($this->prefixes[$prefix], $baseDir);
    }

    /**
     * Carrega a classe especificada
     *
     * @param string $class Nome completo da classe a ser carregada
     * @return bool Retorna true se a classe foi carregada com sucesso, caso contrário false
     * 
     */
    public function loadClass(string $class): bool
    {
        $prefix = $class;

        while (false !== $pos = strrpos($prefix, '\\')) {
            $prefix = substr($class, 0, $pos + 1);
            $relativeClass = substr($class, $pos + 1);

            $mappedFile = $this->loadMappedFile($prefix, $relativeClass);
            if ($mappedFile) {
                return $mappedFile;
            }

            $prefix = rtrim($prefix, '\\');
        }

        return false;
    }

    /**
     * Carrega a classe especificada
     *
     * @param string $prefix Namespace prefix a ser verificado
     * @param string $relativeClass Classe relativa ao namespace prefix
     * @return boolean
     * 
     */
    private function loadMappedFile(string $prefix, string $relativeClass): bool
    {
        if (!isset($this->prefixes[$prefix])) {
            return false;
        }

        foreach ($this->prefixes[$prefix] as $baseDir) {
            $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

            if ($this->requireFile($file)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Requer o arquivo especificado se existir
     *
     * @param string $file Caminho do arquivo a ser requerido
     * @return boolean
     * 
     */
    private function requireFile(string $file): bool
    {
        if (file_exists($file)) {
            require $file;
            return true;
        }
        return false;
    }
}
