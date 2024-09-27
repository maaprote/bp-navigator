<?php

/**
 * Products.
 * 
 * @package Be_Productive_Navigator
 */

declare(strict_types=1);

namespace Be_Productive\Rest;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Products {

    /**
     * Constructor.
     * 
     */
    public function __construct() {
        add_action( 'rest_api_init', array( $this, 'register_routes' ) );
    }

    /**
     * Register routes.
     * 
     * @return void
     */
    public function register_routes(): void {
        register_rest_route( 'bp-navigator/v1', '/products', array(
            'methods' => 'GET',
            'callback' => array( $this, 'get_products' ),
            'permission_callback' => '__return_true',
        ) );

        register_rest_route( 'bp-navigator/v1', '/product-categories', array(
            'methods' => 'GET',
            'callback' => array( $this, 'get_product_categories' ),
            'permission_callback' => '__return_true',
        ) );

        register_rest_route( 'bp-navigator/v1', '/product-tags', array(
            'methods' => 'GET',
            'callback' => array( $this, 'get_product_tags' ),
            'permission_callback' => '__return_true',
        ) );

        register_rest_route( 'bp-navigator/v1', '/product-attributes', array(
            'methods' => 'GET',
            'callback' => array( $this, 'get_product_attributes' ),
            'permission_callback' => '__return_true',
        ) );
    }

    /**
     * Get products.
     * 
     * @return array
     */
    public function get_products(): array {
        $products_ids = wc_get_products( array(
            'limit' => -1,
            'return' => 'ids',
        ) );

        $products = array();
        
        foreach ( $products_ids as $product_id ) {
            $products[] = array(
                'id' => $product_id,
                'name' => get_the_title( $product_id ),
            );
        }

        return $products;
    }

    /**
     * Get product categories.
     * 
     * @return array
     */
    public function get_product_categories(): array {
        $product_cats = get_terms( array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'fields' => 'ids',
        ) );

        $cats = array();
        
        foreach ( $product_cats as $product_cat_id ) {
            $cats[] = array(
                'id' => $product_cat_id,
                'name' => get_term( $product_cat_id )->name,
            );
        }

        return $cats;
    }

    /**
     * Get product tags.
     * 
     * @return array
     */
    public function get_product_tags(): array {
        $product_tags = get_terms( array(
            'taxonomy' => 'product_tag',
            'hide_empty' => false,
            'fields' => 'ids',
        ) );

        $tags = array();
        
        foreach ( $product_tags as $product_tag_id ) {
            $tags[] = array(
                'id' => $product_tag_id,
                'name' => get_term( $product_tag_id )->name,
            );
        }

        return $tags;
    }

    /**
     * Get product attributes.
     * 
     * @return array
     */
    public function get_product_attributes(): array {
        $product_attributes = wc_get_attribute_taxonomies();

        $attributes = array();
        
        foreach ( $product_attributes as $product_attribute ) {
            $attributes[] = array(
                'id' => $product_attribute->attribute_id,
                'name' => $product_attribute->attribute_name,
                'slug' => $product_attribute->attribute_label,
            );
        }

        return $attributes;
    }

    /**
     * Get product attribute term.
     * 
     * @return array
     */
    public function get_product_attribute_term(): array {
        $product_attributes = wc_get_attribute_taxonomies();

        $attributes = array();
        
        foreach ( $product_attributes as $product_attribute ) {
            $attributes[] = array(
                'id' => $product_attribute->attribute_id,
                'name' => $product_attribute->attribute_name,
                'slug' => $product_attribute->attribute_label,
            );
        }

        return $attributes;
    }
}