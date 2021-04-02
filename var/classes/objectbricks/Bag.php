<?php 

/** 
Fields Summary: 
- capacity [quantityValue]
- size [select]
- height [quantityValue]
- width [quantityValue]
- length [quantityValue]
- bagType [select]
- waterproof [checkbox]
*/ 


return Pimcore\Model\DataObject\Objectbrick\Definition::__set_state(array(
   'classDefinitions' => 
  array (
    0 => 
    array (
      'classname' => 'Products',
      'fieldname' => 'productType',
    ),
  ),
   'dao' => NULL,
   'key' => 'Bag',
   'parentClass' => '',
   'implementsInterfaces' => '',
   'title' => '',
   'group' => '',
   'layoutDefinitions' => 
  Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'fieldtype' => 'panel',
     'labelWidth' => 100,
     'layout' => NULL,
     'border' => false,
     'name' => NULL,
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => NULL,
     'height' => NULL,
     'collapsible' => false,
     'collapsed' => false,
     'bodyStyle' => NULL,
     'datatype' => 'layout',
     'permissions' => NULL,
     'childs' => 
    array (
      0 => 
      Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
         'fieldtype' => 'panel',
         'labelWidth' => 100,
         'layout' => NULL,
         'border' => false,
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => '',
         'width' => NULL,
         'height' => NULL,
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'permissions' => NULL,
         'childs' => 
        array (
          0 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => NULL,
             'unitWidth' => NULL,
             'defaultValue' => NULL,
             'defaultUnit' => NULL,
             'validUnits' => 
            array (
              0 => 'ltr',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'queryColumnType' => 
            array (
              'value' => 'double',
              'unit' => 'varchar(50)',
            ),
             'columnType' => 
            array (
              'value' => 'double',
              'unit' => 'varchar(50)',
            ),
             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
             'name' => 'capacity',
             'title' => 'Capacity',
             'tooltip' => '',
             'mandatory' => true,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'defaultValueGenerator' => '',
          )),
          1 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'fieldtype' => 'select',
             'options' => 
            array (
              0 => 
              array (
                'key' => 'Large',
                'value' => 'large',
              ),
              1 => 
              array (
                'key' => 'Medium',
                'value' => 'medium',
              ),
              2 => 
              array (
                'key' => 'Small',
                'value' => 'small',
              ),
            ),
             'width' => '',
             'defaultValue' => '',
             'optionsProviderClass' => '',
             'optionsProviderData' => '',
             'queryColumnType' => 'varchar',
             'columnType' => 'varchar',
             'columnLength' => 190,
             'phpdocType' => 'string',
             'dynamicOptions' => false,
             'name' => 'size',
             'title' => 'Size',
             'tooltip' => '',
             'mandatory' => true,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'defaultValueGenerator' => '',
          )),
          2 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => NULL,
             'unitWidth' => NULL,
             'defaultValue' => NULL,
             'defaultUnit' => NULL,
             'validUnits' => 
            array (
              0 => 'cm',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'queryColumnType' => 
            array (
              'value' => 'double',
              'unit' => 'varchar(50)',
            ),
             'columnType' => 
            array (
              'value' => 'double',
              'unit' => 'varchar(50)',
            ),
             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
             'name' => 'height',
             'title' => 'Height',
             'tooltip' => '',
             'mandatory' => true,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'defaultValueGenerator' => '',
          )),
          3 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => NULL,
             'unitWidth' => NULL,
             'defaultValue' => NULL,
             'defaultUnit' => NULL,
             'validUnits' => 
            array (
              0 => 'cm',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'queryColumnType' => 
            array (
              'value' => 'double',
              'unit' => 'varchar(50)',
            ),
             'columnType' => 
            array (
              'value' => 'double',
              'unit' => 'varchar(50)',
            ),
             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
             'name' => 'width',
             'title' => 'Width',
             'tooltip' => '',
             'mandatory' => true,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'defaultValueGenerator' => '',
          )),
          4 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
             'fieldtype' => 'quantityValue',
             'width' => NULL,
             'unitWidth' => NULL,
             'defaultValue' => NULL,
             'defaultUnit' => NULL,
             'validUnits' => 
            array (
              0 => 'cm',
            ),
             'decimalPrecision' => NULL,
             'autoConvert' => false,
             'queryColumnType' => 
            array (
              'value' => 'double',
              'unit' => 'varchar(50)',
            ),
             'columnType' => 
            array (
              'value' => 'double',
              'unit' => 'varchar(50)',
            ),
             'phpdocType' => '\\Pimcore\\Model\\DataObject\\Data\\QuantityValue',
             'name' => 'length',
             'title' => 'Length',
             'tooltip' => '',
             'mandatory' => true,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'defaultValueGenerator' => '',
          )),
          5 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
             'fieldtype' => 'select',
             'options' => 
            array (
              0 => 
              array (
                'key' => 'Boxing Backpack',
                'value' => 'boxingBackpack',
              ),
              1 => 
              array (
                'key' => 'Gym Backpack',
                'value' => 'gymBackpack',
              ),
              2 => 
              array (
                'key' => 'Sports Backpack',
                'value' => 'sportsBackpack',
              ),
              3 => 
              array (
                'key' => 'Trekking Backpack',
                'value' => 'trekkingBackpack',
              ),
              4 => 
              array (
                'key' => 'Hiking Backpack',
                'value' => 'hikingBackpack ',
              ),
            ),
             'width' => '',
             'defaultValue' => '',
             'optionsProviderClass' => '',
             'optionsProviderData' => '',
             'queryColumnType' => 'varchar',
             'columnType' => 'varchar',
             'columnLength' => 190,
             'phpdocType' => 'string',
             'dynamicOptions' => false,
             'name' => 'bagType',
             'title' => 'Bag Type',
             'tooltip' => '',
             'mandatory' => true,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'defaultValueGenerator' => '',
          )),
          6 => 
          Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::__set_state(array(
             'fieldtype' => 'checkbox',
             'defaultValue' => 1,
             'queryColumnType' => 'tinyint(1)',
             'columnType' => 'tinyint(1)',
             'phpdocType' => 'bool',
             'name' => 'waterproof',
             'title' => 'Waterproof',
             'tooltip' => '',
             'mandatory' => true,
             'noteditable' => false,
             'index' => false,
             'locked' => false,
             'style' => '',
             'permissions' => NULL,
             'datatype' => 'data',
             'relationType' => false,
             'invisible' => false,
             'visibleGridView' => false,
             'visibleSearch' => false,
             'defaultValueGenerator' => '',
          )),
        ),
         'locked' => false,
         'icon' => '',
      )),
    ),
     'locked' => false,
     'icon' => NULL,
  )),
   'generateTypeDeclarations' => false,
));
