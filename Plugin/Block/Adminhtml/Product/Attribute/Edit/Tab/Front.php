<?php
/**
 * @category  SixtySeven
 * @package   SixtySeven_CustomAttribute
 */
namespace SixtySeven\CustomAttribute\Plugin\Block\Adminhtml\Product\Attribute\Edit\Tab;

class Front
{

    /**
     * @var Yesno
     */
    protected $_yesNo;

    /**
     * @param Magento\Config\Model\Config\Source\Yesno $yesNo
     */
    public function __construct(
        \Magento\Config\Model\Config\Source\Yesno $yesNo
    ) {
        $this->_yesNo = $yesNo;
    }

    /**
     * Get form HTML
     *
     * @return string
     */
    public function aroundGetFormHtml(
        \Magento\Catalog\Block\Adminhtml\Product\Attribute\Edit\Tab\Main $subject,
        \Closure $proceed
    )
    {
        $form = $subject->getForm();
        $fieldset = $form->getElement('base_fieldset');
        $element = $fieldset->addField(
            'attribute_description',
            'text',
            [
                'name' => 'attribute_description',
                'label' => __('Description'),
                'sort_order' => '0',
                'title' => __('Description'),
            ]
        );
        $element->setValue($subject->getAttributeObject()->getAttributeDescription());
        return $proceed();
    }
}