<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // Symfony
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            // Dependencies
            new Hautelook\TemplatedUriBundle\HautelookTemplatedUriBundle(),
            new Liip\ImagineBundle\LiipImagineBundle(),
            new FOS\HttpCacheBundle\FOSHttpCacheBundle(),
            new Nelmio\CorsBundle\NelmioCorsBundle(),
            new Oneup\FlysystemBundle\OneupFlysystemBundle(),
            new JMS\TranslationBundle\JMSTranslationBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Bazinga\Bundle\JsTranslationBundle\BazingaJsTranslationBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            new WhiteOctober\PagerfantaBundle\WhiteOctoberPagerfantaBundle(),
            new Gregwar\CaptchaBundle\GregwarCaptchaBundle(),
            // eZ Systems
            new EzSystems\PlatformHttpCacheBundle\EzSystemsPlatformHttpCacheBundle(),
            new EzSystems\PlatformFastlyCacheBundle\EzSystemsPlatformFastlyCacheBundle(),
            new eZ\Bundle\EzPublishCoreBundle\EzPublishCoreBundle(),
            new eZ\Bundle\EzPublishLegacySearchEngineBundle\EzPublishLegacySearchEngineBundle(),
            new eZ\Bundle\EzPublishIOBundle\EzPublishIOBundle(),
            new eZ\Bundle\EzPublishRestBundle\EzPublishRestBundle(),
            new EzSystems\EzSupportToolsBundle\EzSystemsEzSupportToolsBundle(),
            new EzSystems\PlatformInstallerBundle\EzSystemsPlatformInstallerBundle(),
            new EzSystems\RepositoryFormsBundle\EzSystemsRepositoryFormsBundle(),
            new EzSystems\EzPlatformSolrSearchEngineBundle\EzSystemsEzPlatformSolrSearchEngineBundle(),
            new EzSystems\EzPlatformDesignEngineBundle\EzPlatformDesignEngineBundle(),
            new EzSystems\EzPlatformStandardDesignBundle\EzPlatformStandardDesignBundle(),
            new EzSystems\EzPlatformRichTextBundle\EzPlatformRichTextBundle(),
            new EzSystems\EzPlatformAdminUiBundle\EzPlatformAdminUiBundle(),
            new EzSystems\EzPlatformAdminUiModulesBundle\EzPlatformAdminUiModulesBundle(),
            new EzSystems\EzPlatformAdminUiAssetsBundle\EzPlatformAdminUiAssetsBundle(),
            new EzSystems\EzPlatformCronBundle\EzPlatformCronBundle(),
            // eZ Platform EE
            new EzSystems\EzPlatformPageFieldTypeBundle\EzPlatformPageFieldTypeBundle(),
            new EzSystems\EzPlatformPageBuilderBundle\EzPlatformPageBuilderBundle(),
            new EzSystems\EzPlatformFormBuilderBundle\EzPlatformFormBuilderBundle(),
            new EzSystems\DateBasedPublisherBundle\EzSystemsDateBasedPublisherBundle(),
            new EzSystems\FlexWorkflowBundle\EzSystemsFlexWorkflowBundle(),
            new EzSystems\EzPlatformEnterpriseEditionInstallerBundle\EzPlatformEnterpriseEditionInstallerBundle(),

            // eZ Commerce
            new FOS\CommentBundle\FOSCommentBundle(),
            new Tedivm\StashBundle\TedivmStashBundle(),

            new WhiteOctober\BreadcrumbsBundle\WhiteOctoberBreadcrumbsBundle(),
            new Nelmio\SolariumBundle\NelmioSolariumBundle(),
            new JMS\Payment\CoreBundle\JMSPaymentCoreBundle(),
//            new JMS\Payment\PaypalBundle\JMSPaymentPaypalBundle(),
            new Joli\ApacheTikaBundle\ApacheTikaBundle(),
            new Siso\Bundle\OneSkyBundle\OneSkyBundle(),
            new Silversolutions\Bundle\EshopBundle\SilversolutionsEshopBundle(),
            new Silversolutions\Bundle\DatatypesBundle\SilversolutionsDatatypesBundle(),
            new Silversolutions\Bundle\ToolsBundle\SilversolutionsToolsBundle(),
            new Silversolutions\Bundle\TranslationBundle\SilversolutionsTranslationBundle(),
            new Siso\Bundle\EzStudioBundle\SisoEzStudioBundle(),
            new Siso\Bundle\CheckoutBundle\SisoCheckoutBundle(),
            new Siso\Bundle\ComparisonBundle\SisoComparisonBundle(),
            new Siso\Bundle\PaymentBundle\SisoPaymentBundle(),
//            new Siso\Bundle\PaypalPaymentBundle\SisoPaypalPaymentBundle(),
            new Kaliop\eZMigrationBundle\EzMigrationBundle(),
            new Siso\Bundle\PriceBundle\SisoPriceBundle(),
            new Siso\Bundle\QuickOrderBundle\SisoQuickOrderBundle(),
            new Siso\Bundle\ToolsBundle\SisoToolsBundle(),
            new Siso\Bundle\TestToolsBundle\SisoTestToolsBundle(),
            new Siso\Bundle\SearchBundle\SisoSearchBundle(),
            new Siso\Bundle\VoucherBundle\SisoVoucherBundle(),
            new Siso\ShopPriceEnginePluginBundle\ShopPriceEnginePluginBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle($this),
            new Siso\Bundle\LocalOrderManagementBundle\SisoLocalOrderManagementBundle(),
            new Siso\Bundle\NewsletterBundle\SisoNewsletterBundle(),
            new Siso\Bundle\VariantTypeBundle\SisoVariantTypeBundle(),
            new Siso\Bundle\SpecificationsTypeBundle\SisoSpecificationsTypeBundle(),
            new Siso\Bundle\ContentPluginBundle\SisoContentPluginBundle(),
            new Siso\Bundle\ContentLoaderBundle\SisoContentLoaderBundle(),
            new Siso\Bundle\OrderHistoryBundle\SisoOrderHistoryBundle(),

            // Application
            new AppBundle\AppBundle(),
        ];

        switch ($this->getEnvironment()) {
            case 'test':
            case 'behat':
                $bundles[] = new EzSystems\BehatBundle\EzSystemsBehatBundle();
                $bundles[] = new EzSystems\PlatformBehatBundle\EzPlatformBehatBundle();
            // No break, test also needs dev bundles
            case 'dev':
                $bundles[] = new eZ\Bundle\EzPublishDebugBundle\EzPublishDebugBundle();
                $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
                $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
                $bundles[] = new Symfony\Bundle\WebServerBundle\WebServerBundle();
                $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
                $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function getCacheDir()
    {
        if (!empty($_SERVER['SYMFONY_TMP_DIR'])) {
            return rtrim($_SERVER['SYMFONY_TMP_DIR'], '/') . '/var/cache/' . $this->getEnvironment();
        }

        // On platform.sh place each deployment cache in own folder to rather cleanup old cache async
        if ($this->getEnvironment() === 'prod' && ($platformTreeId = getenv('PLATFORM_TREE_ID'))) {
            return dirname(__DIR__) . '/var/cache/prod/' . $platformTreeId;
        }

        return dirname(__DIR__) . '/var/cache/' . $this->getEnvironment();
    }

    public function getLogDir()
    {
        if (!empty($_SERVER['SYMFONY_TMP_DIR'])) {
            return rtrim($_SERVER['SYMFONY_TMP_DIR'], '/') . '/var/logs';
        }

        return dirname(__DIR__) . '/var/logs';
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir() . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
