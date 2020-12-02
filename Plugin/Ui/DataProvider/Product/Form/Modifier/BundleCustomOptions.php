<?php

namespace Klanjabrik\Bundle\Plugin\Ui\DataProvider\Product\Form\Modifier;

use Magento\Ui\Component\Form\Field;
use Magento\Ui\Component\Form\Element\Input;
use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Bundle\Ui\DataProvider\Product\Form\Modifier\BundleCustomOptions as MagentoBundleCustomOptions;

class BundleCustomOptions
{

    const FIELD_CUSTOM_FIELD_OPTION_NAME = 'product_id';

    public function afterModifyMeta(MagentoBundleCustomOptions $subject, array $meta)
    {
        if (isset($meta['bundle-items']['children']['bundle_options']['children']['record']['children']['product_bundle_container']['children']['bundle_selections']['children']['record']['children'])) {


            $meta['bundle-items']['children']['bundle_options']['children']['record']['children']['product_bundle_container']['children']['bundle_selections']['children']['record']['children'][static::FIELD_CUSTOM_FIELD_OPTION_NAME] = $this->getCustomFieldOptionFieldConfig(125);


            // Reorder table headings

            $action_delete = $meta['bundle-items']['children']['bundle_options']['children']['record']['children']['product_bundle_container']['children']['bundle_selections']['children']['record']['children']['action_delete'];
            unset($meta['bundle-items']['children']['bundle_options']['children']['record']['children']['product_bundle_container']['children']['bundle_selections']['children']['record']['children']['action_delete']);
            $meta['bundle-items']['children']['bundle_options']['children']['record']['children']['product_bundle_container']['children']['bundle_selections']['children']['record']['children']['action_delete'] = $action_delete;

        }

        return $meta;
    }

    protected function getCustomFieldOptionFieldConfig($sortOrder)
    {

        return [
            'arguments' => [
                        'data' => [
                            'config' => [
                                'component' => 'Klanjabrik_Bundle/js/components/bundle-view-product',
                                'componentType' => Field::NAME,
                                'dataType' => Text::NAME,
                                'formElement' => Input::NAME,
                                'elementTmpl' => 'Klanjabrik_Bundle/dynamic-rows/cells/link',
                                'label' => __(''),
                                'dataScope' => static::FIELD_CUSTOM_FIELD_OPTION_NAME,
                                'sortOrder' => $sortOrder
                            ],
                        ],
                    ],
                ];
    }

}