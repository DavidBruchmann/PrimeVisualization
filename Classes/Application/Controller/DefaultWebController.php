<?php

namespace WDB\PrimeVisualization\Application\Controller;

use \WDB\PrimeVisualization\Application\Domain\Model\HtmlPage;
use \WDB\PrimeVisualization\Application\Domain\Repository\ContentFromConfigurationRepository;
use \WDB\PrimeVisualization\Application\Domain\Repository\StaticPagesRepository;
use \WDB\PrimeVisualization\Application\Domain\Repository\StreamingContentRepository;
use \WDB\PrimeVisualization\Application\Provider\NavigationProvider;
use \TYPO3Fluid\Fluid\View\TemplateView;

class DefaultWebController
{
    protected $applicationContext = null;
    
    public function __construct($applicationContext)
    {
        $this->applicationContext = $applicationContext;
        $this->initView();
    }
    
    public function initView()
    {
        $viewBaseDir = PRIME_V_DIR . 'Resources/Private/';

        // @TODO: put fluid logic in own view-class
        $this->view = new TemplateView;
        $viewPaths = $this->view->getTemplatePaths();
        $viewPaths->setTemplateRootPaths([
            $viewBaseDir . 'Templates/',
        ]);
        $viewPaths->setLayoutRootPaths([
            $viewBaseDir . 'Layouts/',
        ]);
        $viewPaths->setPartialRootPaths([
            $viewBaseDir . 'Partials/',
        ]);
    }

    public function defaultAction()
    {
        $repository = new ContentFromConfigurationRepository;
        $contentTop = 'contentTop';

        $contentLeft = 'contentLeft';

        $headline = 'Headline';
        $content = __METHOD__ . ':' . __LINE__ . '<br/>' . "\n";

        $contentRight = 'contentRight';

        $contentFooter = 'contentFooter';

        $this->view->assignMultiple([
            'contentTop' => $contentTop,
            'contentLeft' => $contentLeft,
            'headline' => $headline,
            'content' => $content,
            'contentRight' => $contentRight,
            'contentFooter' => $contentFooter
        ]);

        # $this->view->assign('streamingContent',1);

        $output = $this->view->render();
        echo $output;
    }

    public function staticContentAction()
    {
        $repository = new StaticPagesRepository;
        $content = __METHOD__ . ':' . __LINE__ . '<br/>' . "\n";
        $this->view->assign('content', $content);
        $output = $this->view->render();
        echo $output;
    }

    public function streamingContentAction()
    {
        $repository = new StreamingContentRepository;
        $content = __METHOD__ . ':' . __LINE__ . '<br/>' . "\n";
        $this->view->assign('content', $content);
        $output = $this->view->render();
        echo $output;
    }
    
    public function renderHtmlHead(HtmlPage $page)
    {
        /*
        $pageTitle = '',
        $languageIsoCode = 'en',
        $charset = 'UTF-8',
        $cssFiles = [],
        $cssStream = null,
        $jsFiles = [],
        $jsStream = null,
        */
        
    }
}