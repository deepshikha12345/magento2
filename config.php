 <?php
    $simple_product = $this->_objectManager->create('\Magento\Catalog\Model\Product');
    $simple_product->setSku('test-simple');
    $simple_product->setName('test name simple');
    $simple_product->setAttributeSetId(4);
    $simple_product->setSize_general(193); // value id of S size
    $simple_product->setStatus(1);
    $simple_product->setTypeId('simple');
    $simple_product->setPrice(10);
    $simple_product->setWebsiteIds(array(1));
    $simple_product->setCategoryIds(array(31));
    $simple_product->setStockData(array(
        'use_config_manage_stock' => 0, //'Use config settings' checkbox
        'manage_stock' => 1, //manage stock
        'min_sale_qty' => 1, //Minimum Qty Allowed in Shopping Cart
        'max_sale_qty' => 2, //Maximum Qty Allowed in Shopping Cart
        'is_in_stock' => 1, //Stock Availability
        'qty' => 100 //qty
        )
    );

    $simple_product->save();

    $simple_product_id = $simple_product->getId();
    echo "simple product id: ".$simple_product_id."\n";


    //configurable product
    $configurable_product = $this->_objectManager->create('\Magento\Catalog\Model\Product');
    $configurable_product->setSku('test-configurable');
    $configurable_product->setName('test name configurable');
    $configurable_product->setAttributeSetId(4);
    $configurable_product->setStatus(1);
    $configurable_product->setTypeId('configurable');
    $configurable_product->setPrice(11);
    $configurable_product->setWebsiteIds(array(1));
    $configurable_product->setCategoryIds(array(31));
    $configurable_product->setStockData(array(
        'use_config_manage_stock' => 0, //'Use config settings' checkbox
        'manage_stock' => 1, //manage stock
        'is_in_stock' => 1, //Stock Availability
        )
    );

    $configurable_product->getTypeInstance()->setUsedProductAttributeIds(array(152),$configurable_product); //attribute ID of attribute 'size_general' in my store
    $configurableAttributesData = $configurable_product->getTypeInstance()->getConfigurableAttributesAsArray($configurable_product);

    $configurable_product->setCanSaveConfigurableAttributes(true);
    $configurable_product->setConfigurableAttributesData($configurableAttributesData);

    $configurableProductsData = array();
    $configurableProductsData[$simple_product_id] = array( //[$simple_product_id] = id of a simple product associated with this configurable
        '0' => array(
            'label' => 'S', //attribute label
            'attribute_id' => '152', //attribute ID of attribute 'size_general' in my store
            'value_index' => '193', //value of 'S' index of the attribute 'size_general'
            'is_percent'    => 0,
            'pricing_value' => '10',
        )
    );
    $configurable_product->setConfigurableProductsData($configurableProductsData);

    $configurable_product->save();

    echo "configurable product id: ".$configurable_product->getId()."\n";
    
    ?>