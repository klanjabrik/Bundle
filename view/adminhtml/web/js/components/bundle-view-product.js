/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

define([
    'Magento_Ui/js/form/element/abstract',
    'jquery', 
    'mage/url'
], function (Abstract, $, urlBuilder) {
    'use strict';
    var productId;
    return Abstract.extend({

        initialize: function (){
            this.productId = this._super().initialValue
            return this._super();
        },    
    
        getCustomUrl: function () {
            var url = urlBuilder.build("../../../../../../../catalog/product/edit/id/" + this.productId);
            return url;
        },

        getCustomText: function () {
            return 'View';
        }
    });
});
