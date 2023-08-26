<?php declare(strict_types=1);

namespace Nicolasblancom\LiveReloadScript\Block;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\State;
use Magento\Framework\View\Element\Template;

class Head extends Template
{
    const LIVERELOAD_DEFAULT_SCRIPT_URL     = '/livereload.js?port=443';
    const LIVERELOAD_CONFIG_PATH_ENABLED    = 'dev/nicolasblancom_livereloadscript/enable';
    const LIVERELOAD_CONFIG_PATH_SCRIPT_URL = 'dev/nicolasblancom_livereloadscript/script_url';

    public function __construct(
        Template\Context             $context,
        private State                $state,
        private ScopeConfigInterface $scopeConfig,
    ) {
        parent::__construct($context);
    }

    /**
     * Returns global module enabled status
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        $isEnabled = $this->scopeConfig->getValue(self::LIVERELOAD_CONFIG_PATH_ENABLED);
        if (!$isEnabled) {
            return false;
        }

        $isInDeveloperMode = $this->state->getMode() === State::MODE_DEVELOPER;
        if (!$isInDeveloperMode) {
            return false;
        }

        return true;
    }

    /**
     * Get script URL to add it to the head
     *
     * @return string
     */
    public function getScriptURL(): string
    {
        $scriptUrl = $this->scopeConfig->getValue(self::LIVERELOAD_CONFIG_PATH_SCRIPT_URL);
        if (!$scriptUrl) {
            return self::LIVERELOAD_DEFAULT_SCRIPT_URL;
        }

        return $scriptUrl;
    }
}
