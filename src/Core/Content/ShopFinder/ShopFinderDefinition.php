<?php declare(strict_types=1);

namespace SynlabShopFinder\Core\Content\ShopFinder;

use Shopware\Core\Framework\App\Manifest\Xml\CustomFieldTypes\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField as FieldBoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\LongTextField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Country\CountryDefinition;

class ShopFinderDefinition extends EntityDefinition
{

    public function getEntityName(): string
    {
        return 'synlab_shop_finder';
    }

    public function getCollectionClass(): string
    {
        return ShopFinderCollection::class;
    }

    public function getEntityClass(): string
    {
        return ShopFinderEntity::class;
    }

    protected function defineFields(): FieldCollection
    {
        /*
         * IDfield id
         * BoolField active
         * StringField name
         * StringField street
         * StringField post_code
         * StringField city
         * StringField url
         * StringField telephone
         * StringField open_times
         * FkField country_id
         * ManyToOneAssociation country to CountryDefinition
         * 
         * required: name street post_code city
         */
        return new FieldCollection(
            [
                (new IdField('id','id'))->addFlags(new Required(), new PrimaryKey()),
                new FieldBoolField('active','active'),
                (new StringField('name','name'))->addFlags(new Required()),
                (new StringField('street','street'))->addFlags(new Required()),
                (new StringField('post_code','postCode'))->addFlags(new Required()),
                (new StringField('city','city'))->addFlags(new Required()),
                new StringField('url','url'),
                new StringField('telephone','telephone'),
                new LongTextField('open_times','openTimes'),

                new FkField('country_id','countryId', CountryDefinition::class),
                
                new ManyToOneAssociationField(
                    'country',
                    'country_id',
                    CountryDefinition::class,
                    'id',
                    false
                )
            ]
        );


    }
}