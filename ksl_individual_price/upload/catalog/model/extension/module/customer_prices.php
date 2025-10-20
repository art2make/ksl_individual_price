<?php
class ModelExtensionModuleCustomerPrices extends Model {
    public function getCustomerPrice($product_id, $customer_id) {
        $query = $this->db->query("SELECT " . DB_PREFIX . "customer_individ_price.price FROM `" . DB_PREFIX . "product` 
								LEFT JOIN " . DB_PREFIX . "customer_individ_price ON " . DB_PREFIX . "customer_individ_price.product_1c_sku = " . DB_PREFIX . "product.model
								LEFT JOIN " . DB_PREFIX . "customer_individ_users ON " . DB_PREFIX . "customer_individ_users.code_1c = " . DB_PREFIX . "customer_individ_price.customer_1c_id
								WHERE " . DB_PREFIX . "product.product_id = " . (int)$product_id . "   AND " . DB_PREFIX . "customer_individ_users.user_id = " . (int)$customer_id . " LIMIT 1");
								
								
        return $query->num_rows ? $query->row['price'] : false;
    }
}


