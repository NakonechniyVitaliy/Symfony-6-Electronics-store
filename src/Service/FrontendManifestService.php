<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class FrontendManifestService
{
    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }
    public function getManifest()
    {
        $manifestPath = $this->params->get('kernel.project_dir') . '\public\frontend\.vite\manifest.json';
        $manifest = json_decode(file_get_contents($manifestPath), true);
        return $manifest;
    }

    public function getJsManifest()
    {
       return $this->getManifest()['index.html']['file'];
    }

    public function getCssManifest()
    {
        return $this->getManifest()['index.html']['css'][0];
    }

}
