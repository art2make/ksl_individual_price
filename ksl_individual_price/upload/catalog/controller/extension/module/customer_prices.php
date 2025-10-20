<?php
class ControllerExtensionModuleCustomerPrices extends Controller {
    
    public function index() {
        // Переопределяем модели для авторизованных пользователей
        if ($this->customer->isLogged()) {
            // Загружаем кастомные модели
            $this->load->model('catalog/product_custom');
            $this->load->model('checkout/cart_custom');
            
            // Продукты
            $this->registry->set('model_catalog_product', new ModelCatalogProductCustom($this->registry));
            
            // Корзина
            $this->registry->set('model_checkout_cart', new ModelCheckoutCartCustom($this->registry));
        }
    }
    
    public function getCustomerPrice($product_id) {	
        if ($this->customer->isLogged()) {
            $this->load->model('extension/module/customer_prices');
            return $this->model_extension_module_customer_prices->getCustomerPrice($product_id, $this->customer->getId());
        }
        return false;
    }
}