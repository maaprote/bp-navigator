<?php

/**
 * Utils.
 * 
 */

declare(strict_types=1);

namespace Be_Productive;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Utils {

    /**
     * Get shortcuts options list.
     * 
     * @return array
     * @since 1.0.0
     */
    public static function get_shortcuts_options_list(): array {
        $shortcuts = array();

        // WordPress Core.
        $shortcuts[] = array(
            'label' => __( 'Admin: Admin Dashboard', 'bp-navigator' ),
            'value' => admin_url(),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Updates', 'bp-navigator' ),
            'value' => admin_url( 'update-core.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: All posts', 'bp-navigator' ),
            'value' => add_query_arg( array( 'post_type' => 'post' ), admin_url( 'edit.php' ) ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Add new post', 'bp-navigator' ),
            'value' => admin_url( 'post-new.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Edit post', 'bp-navigator' ),
            'value' => 'edit:post',
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Categories', 'bp-navigator' ),
            'value' => add_query_arg( array( 'taxonomy' => 'category' ), admin_url( 'edit-tags.php' ) ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Add new category', 'bp-navigator' ),
            'value' => add_query_arg( array( 'taxonomy' => 'category' ), admin_url( 'edit-tags.php' ) ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Edit category', 'bp-navigator' ),
            'value' => 'edit:category',
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Tags', 'bp-navigator' ),
            'value' => add_query_arg( array( 'taxonomy' => 'post_tag' ), admin_url( 'edit-tags.php' ) ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Add new tag', 'bp-navigator' ),
            'value' => add_query_arg( array( 'taxonomy' => 'post_tag' ), admin_url( 'edit-tags.php' ) ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Edit tag', 'bp-navigator' ),
            'value' => 'edit:tag',
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Media library', 'bp-navigator' ),
            'value' => admin_url( 'upload.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Add new media file', 'bp-navigator' ),
            'value' => admin_url( 'media-new.php' ),
        );
        
        $shortcuts[] = array(
            'label' => __( 'Admin: All pages', 'bp-navigator' ),
            'value' => add_query_arg( array( 'post_type' => 'page' ), admin_url( 'edit.php' ) ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Add new page', 'bp-navigator' ),
            'value' => add_query_arg( array( 'post_type' => 'page' ), admin_url( 'post-new.php' ) ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Edit page', 'bp-navigator' ),
            'value' => 'edit:page',
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Comments', 'bp-navigator' ),
            'value' => admin_url( 'edit-comments.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Appearance → Themes', 'bp-navigator' ),
            'value' => admin_url( 'themes.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Appearance → Patterns', 'bp-navigator' ),
            'value' => add_query_arg( array( 'path' => 'patterns' ), admin_url( 'site-editor.php' ) ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Appearance → Customize', 'bp-navigator' ),
            'value' => admin_url( 'customize.php' ), // TODO: Add compatibility with the 'return' parameter.
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Appearance → Widgets', 'bp-navigator' ),
            'value' => admin_url( 'widgets.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Appearance → Menus', 'bp-navigator' ),
            'value' => admin_url( 'nav-menus.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Edit menu', 'bp-navigator' ),
            'value' => 'edit:menu',
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Appearance → Header', 'bp-navigator' ),
            'value' => add_query_arg( array( 'autofocus[control]' => 'header_image' ), admin_url( 'customize.php' ) ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Appearance → Background', 'bp-navigator' ),
            'value' => add_query_arg( array( 'autofocus[control]' => 'background_image' ), admin_url( 'customize.php' ) ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Appearance → Theme file editor', 'bp-navigator' ),
            'value' => admin_url( 'theme-editor.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Plugins → Installed plugins', 'bp-navigator' ),
            'value' => admin_url( 'plugins.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Plugins → Add new plugin', 'bp-navigator' ),
            'value' => admin_url( 'plugin-install.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Plugins → Plugin file editor', 'bp-navigator' ),
            'value' => admin_url( 'plugin-editor.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Users → All users', 'bp-navigator' ),
            'value' => admin_url( 'users.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Users → Add new user', 'bp-navigator' ),
            'value' => admin_url( 'user-new.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Edit user', 'bp-navigator' ),
            'value' => 'edit:user',
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Users → Profile', 'bp-navigator' ),
            'value' => admin_url( 'profile.php' ),
        );
        
        $shortcuts[] = array(
            'label' => __( 'Admin: Tools → Available Tools', 'bp-navigator' ),
            'value' => admin_url( 'tools.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Tools → Import', 'bp-navigator' ),
            'value' => admin_url( 'import.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Tools → Export', 'bp-navigator' ),
            'value' => admin_url( 'export.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Tools → Site health', 'bp-navigator' ),
            'value' => admin_url( 'site-health.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Tools → Export personal data', 'bp-navigator' ),
            'value' => admin_url( 'export-personal-data.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Tools → Erase personal data', 'bp-navigator' ),
            'value' => admin_url( 'erase-personal-data.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Settings → General', 'bp-navigator' ),
            'value' => admin_url( 'options-general.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Settings → Writing', 'bp-navigator' ),
            'value' => admin_url( 'options-writing.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Settings → Reading', 'bp-navigator' ),
            'value' => admin_url( 'options-reading.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Settings → Discussion', 'bp-navigator' ),
            'value' => admin_url( 'options-discussion.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Settings → Media', 'bp-navigator' ),
            'value' => admin_url( 'options-media.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Settings → Permalinks', 'bp-navigator' ),
            'value' => admin_url( 'options-permalink.php' ),
        );

        $shortcuts[] = array(
            'label' => __( 'Admin: Settings → Privacy', 'bp-navigator' ),
            'value' => admin_url( 'options-privacy.php' ),
        );
        
        // WooCommerce.
        if ( class_exists( 'WooCommerce' ) ) {
            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Home', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Orders', 'bp-navigator' ),
                'value' => add_query_arg( array( 'post_type' => 'shop_order' ), admin_url( 'edit.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Customers', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/customers' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Coupons', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'coupons-moved' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Reports', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-reports' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Settings', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-settings' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Status', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-status' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Extensions', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/extensions' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → All products', 'bp-navigator' ),
                'value' => add_query_arg( array( 'post_type' => 'product' ), admin_url( 'edit.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Add new product', 'bp-navigator' ),
                'value' => add_query_arg( array( 'post_type' => 'product' ), admin_url( 'post-new.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Edit product', 'bp-navigator' ),
                'value' => 'edit:product',
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Product categories', 'bp-navigator' ),
                'value' => add_query_arg( array( 'post_type' => 'product', 'taxonomy' => 'product_cat' ), admin_url( 'edit-tags.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Edit product category', 'bp-navigator' ),
                'value' => 'edit:product-category',
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Product tags', 'bp-navigator' ),
                'value' => add_query_arg( array( 'post_type' => 'product', 'taxonomy' => 'product_tag' ), admin_url( 'edit-tags.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Edit product tag', 'bp-navigator' ),
                'value' => 'edit:product-tag',
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Product attributes', 'bp-navigator' ),
                'value' => add_query_arg( array( 'post_type' => 'product', 'page' => 'product_attributes' ), admin_url( 'edit.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Edit product attribute', 'bp-navigator' ),
                'value' => 'edit:product-attribute',
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Add product attribute term', 'bp-navigator' ),
                'value' => 'add:product-attribute-term',
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Product reviews', 'bp-navigator' ),
                'value' => add_query_arg( array( 'post_type' => 'product', 'page' => 'product-reviews' ), admin_url( 'edit.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Payments', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/wc-pay-welcome-page' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Analytics overview', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/analytics/overview' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Analytics products', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/analytics/products' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Analytics revenue', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/analytics/revenue' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Analytics orders', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/analytics/orders' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Analytics variations', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/analytics/variations' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Analytics categories', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/analytics/categories' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Analytics coupons', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/analytics/coupons' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Analytics taxes', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/analytics/taxes' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Analytics downloads', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/analytics/downloads' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Analytics stock', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/analytics/stock' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Analytics settings', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/analytics/settings' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Marketing overview', 'bp-navigator' ),
                'value' => add_query_arg( array( 'page' => 'wc-admin', 'path' => '/marketing' ), admin_url( 'admin.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Marketing coupons', 'bp-navigator' ),
                'value' => add_query_arg( array( 'post_type' => 'shop_coupon' ), admin_url( 'edit.php' ) ),
            );

            $shortcuts[] = array(
                'label' => __( 'Admin: WooCommerce → Marketing overview', 'bp-navigator' ),
                'value' => add_query_arg( array( 'post_type' => 'shop_coupon' ), admin_url( 'edit.php' ) ),
            );
        }

        /**
         * Hook 'bp_navigator_shortcuts_options_list'.
         * Filters the shortcuts options list.
         * 
         * @param array $shortcuts Shortcuts options list.
         * @since 1.0.0
         */
        return apply_filters( 'bp_navigator_shortcuts_options_list', $shortcuts );
    }
}