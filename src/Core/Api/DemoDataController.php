<?php declare(strict_types=1);

namespace SynlabShopFinder\Core\Api;

use Faker\Factory;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Exception\InconsistentCriteriaIdsException;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Shopware\Core\Framework\Uuid\Uuid;
use Shopware\Core\System\Country\CountryEntity;
use Shopware\Core\System\Country\Exception\CountryNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @RouteScope(scopes={"api"})
 */
class DemoDataController extends AbstractController
{
    /**
     * @var EntityRepositoryInterface
     */
    private $countryRepository;
    /**
     * @var EntityRepositoryInterface
     */
    private $shopFinderRepository;

    public function __construct(EntityRepositoryInterface $countryRepository,EntityRepositoryInterface $shopFinderRepository)
    {
        $this->countryRepository = $countryRepository;
        $this->shopFinderRepository = $shopFinderRepository;
    }

    /**
     * @Route("/api/v{version}/_action/synlab-shop-finder/generate", name="api.custom.synlab_shop_finder.generate", methods={"POST"})
     * @param Context $context;
     * @return Response
     * @throws CountryNotFoundException
     * @throws InconsistentCriteriaIdsException
     */
    public function generate(Context $context): Response
    {
        $faker = Factory::create();
        $country = $this->getActiveCountry($context);

        $data = [];

        for($i = 0; $i < 10; $i++)
        {
            $data[] = [
                'id' => Uuid::randomHex(),
                'active' => true,
                'name' => $faker->name,
                'street' => $faker->streetAddress,
                'postCode' => $faker->postcode,
                'city' => $faker->city,
                'url' => 'www.4theye.net',
                'telephone' => '00497131162757',
                'countryId' => $country->getId(),
            ];
        }
        $this->shopFinderRepository->create($data, $context);

        return new Response('',Response::HTTP_NO_CONTENT);
    }

    /**
     * @param Context $context
     * @return CountryEntity
     * @throws CountryNotFoundException
     * @throws InconsistentCriteriaIdsException
     */
    private function getActiveCountry(Context $context): CountryEntity
    {
        $criteria = new Criteria();
        $criteria->addFilter(new EqualsFilter('active','1'));

        $criteria->setLimit(1);

        $country = $this->countryRepository->search($criteria, $context)->getEntities()->first();

        if($country === null)
        {
            throw new CountryNotFoundException('');
        }

        return $country;
    }
}