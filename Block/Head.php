<?php declare(strict_types=1);

namespace Nicolasblancom\LiveReloadScript\Block;

// TODO load config interface
//use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\State;
use Magento\Framework\View\Element\Template;

class Head extends Template
{
    const LIVERELOAD_DEFAULT_SCRIPT_URL     = '/livereload.js?port=443';
    const LIVERELOAD_CONFIG_PATH_ENABLED    = 'dev/livereload/enable';
    const LIVERELOAD_CONFIG_PATH_SCRIPT_URL = 'dev/livereload/script_url';

    public function __construct(
        Template\Context $context,
        private State $state,
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
        // TODO: get value config and fallback to defined constant

        if ($this->state->getMode() !== State::MODE_DEVELOPER) {
            return false;
        }

        return true;
    }

    public function getScriptURL(): string
    {
        // TODO: get value config and fallback to defined constant
        return '/livereload.js?port=443';
    }
}
