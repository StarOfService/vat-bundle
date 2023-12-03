<?php

namespace Ibericode\Vat\Bundle\Tests\DependencyInjection;

use Ibericode\Vat\Bundle\Validator\Constraints\VatNumberValidator;
use Ibericode\Vat\Countries;
use Ibericode\Vat\Geolocator;
use Ibericode\Vat\Rates;
use Ibericode\Vat\Validator;
use Ibericode\Vat\Bundle\DependencyInjection\VatExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use PHPUnit\Framework\TestCase;

class VatExtensionTest extends TestCase
{
    public function testDefault()
    {
        $container = new ContainerBuilder();
        $loader = new VatExtension();
        $loader->load([[]], $container);
        $this->assertTrue($container->hasDefinition('ibericode_vat.countries'));
        $this->assertTrue($container->hasDefinition('ibericode_vat.rates'));
        $this->assertTrue($container->hasDefinition('ibericode_vat.validator'));
        $this->assertTrue($container->hasDefinition('ibericode_vat.geolocator'));

        $this->assertTrue($container->has(Countries::class), 'Countries class is wired');
        $this->assertTrue($container->has(Rates::class), 'Rates class is wired');
        $this->assertTrue($container->has(Validator::class), 'Validator class is wired');
        $this->assertTrue($container->has(Geolocator::class), 'Geolocator class is wired');
        $this->assertTrue($container->has(VatNumberValidator::class), 'VatNumberValidator class is wired');
    }
}