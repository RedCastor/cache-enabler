<?php


// exit
defined('ABSPATH') OR exit;


/**
 * Cache_Enabler Woocommerce
 *
 * @since 1.3.2
 */

final class Cache_Enabler_Woocommerce {


    /**
     * Cache_Enabler_Woocommerce constructor.
     */
    public function __construct() {

        add_action('woocommerce_product_set_stock', array($this, 'product_set_stock'), 10);
        add_action('woocommerce_product_set_stock_status', array($this, 'product_set_stock_status'), 10);
        add_action('woocommerce_variation_set_stock', array($this, 'product_set_stock'), 10);
        add_action('woocommerce_variation_set_stock_status', array($this, 'product_set_stock_status'), 10);
        add_action('woocommerce_save_product_variation', array($this, 'save_product_variation'), 10, 2);
        add_action('woocommerce_after_product_ordering', array($this, 'save_product_ordering'), 10, 2);

        add_filter('ce_cache_cleaner_clean_ids', array($this, 'clear_cache_by_ids'), 10, 2);
    }


    /**
     * On Product stock change
     *
     * @param $product
     */
    public function product_set_stock($product) {

        $this->product_set_stock_status($product->get_id());
    }

    public function product_set_stock_status($product_id) {

        Cache_Enabler::clear_page_cache_by_post_id($product_id);
    }


    /**
     * On Save product variation
     *
     * @param $variation_id
     * @param $i
     */
    public function save_product_variation($variation_id, $i) {

        //Clear cache only on time by remove this action
        $product_id = wp_get_post_parent_id($variation_id);

        if ($product_id) {

            Cache_Enabler::clear_page_cache_by_post_id($product_id);

            remove_action('woocommerce_save_product_variation', array($this, 'save_product_variation'), 10);
        }
    }


    /**
     * After Ajax order product
     *
     * @param $sorting_id
     * @param $menu_orders
     */
    public function save_product_ordering($sorting_id, $menu_orders) {

        Cache_Enabler::clear_page_cache_by_post_id($sorting_id);
    }


    /**
     * Add linked Ids for cross sell and upsell to cleaner queue
     *
     * @param $ids
     */
    public function clear_cache_by_ids( $ids ) {

        if (is_array($ids)) {

            foreach ($ids as $id) {

                if (get_post_type($id) != 'product') {
                    continue;
                }

                //Get product with this product id in cross sell and upsell
                $product_query = new WP_Query( array(
                    'fields' => 'ids',
                    'post_type' => 'product',
                    'meta_query' => array(
                        'relation' => 'OR',
                        array(
                            'key'     => '_crosssell_ids',
                            'value'   => strval($id),
                            'compare' => 'LIKE'
                        ),
                        array(
                            'key'     => '_upsell_ids',
                            'value'   => strval($id),
                            'compare' => 'LIKE'
                        ),
                    )
                ) );

                $product_ids = (array)$product_query->posts;
                $product_ids[] = $id;

                $product_ids = array_unique($product_ids);

                $ids = array_merge($ids, $product_ids);
            }
        }

        return $ids;
    }
}
