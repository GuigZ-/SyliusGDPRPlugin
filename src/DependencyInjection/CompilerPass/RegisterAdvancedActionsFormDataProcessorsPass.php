<?php

declare(strict_types=1);

namespace Synolia\SyliusGDPRPlugin\DependencyInjection\CompilerPass;

use Sylius\Bundle\ResourceBundle\DependencyInjection\Compiler\PrioritizedCompositeServicePass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Synolia\SyliusGDPRPlugin\Processor\AdvancedActions\AdvancedActionsFormDataProcessorInterface;

final class RegisterAdvancedActionsFormDataProcessorsPass extends PrioritizedCompositeServicePass
{
    public const PROCESSOR_SERVICE_TAG = 'synolia.advanced_actions_form_data_processor';

    public function __construct()
    {
        parent::__construct(
            'synolia.gdpr_processing.advanced_actions_form_data_processor',
            'Synolia\SyliusGDPRPlugin\Processor\AdvancedActions\CompositeAdvancedActionsFormDataProcessor',
            self::PROCESSOR_SERVICE_TAG,
            'addProcessor'
        );
    }

    public function process(ContainerBuilder $container): void
    {
        parent::process($container);

        $container->setAlias(AdvancedActionsFormDataProcessorInterface::class, 'synolia.gdpr_processing.advanced_actions_form_data_processor');
    }
}
