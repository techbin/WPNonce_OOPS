<?php
declare(strict_types=1);
/**
 * This file is part of the Wordpress Nonce Oops package.
 *
 * @package WPNonce_Oops
 * @author  Satish Kumar <satish.prg@gmail.com>
 */
namespace WpnonceOops;
/**
 * Abstract class with Nonce functions to be implemented
 */
interface WpnonceOopsInterface
{
    public function generateNonce($action);
    public function creatNonceField($action, $field);
    public function createNonceUrl( $actionurl, $action, $name );
    public function verifyNonce($action, $field);
}
/**
 * Main Class with Nonce functions implemented
 */
class WpnonceOops implements WpnonceOopsInterface
{
    /**
     * Generate Nonce
     *
     * @param string $action The action the auth refers to.
	 *    
     * @return mixed
     */
    public function generateNonce($action) 
    {
        if (!is_string($action)) {
            throw new InvalidArgumentException('Action must be a string');
        }
        if (!function_exists('wp_create_nonce')) {
            throw new Exception('Wordpress instance not found');
        }
        return wp_create_nonce($action);
    }
    /**
     * Create Nonce Field
     *
     * @param string $action The action Nonce refers to.
     * @param string $field  The Nonce field.
     *
     * @return mixed
     */
    public function creatNonceField($action, $field) 
    {
        if (!is_string($action)) {
            throw new InvalidArgumentException('Action must be a string');
        }
        if (!is_string($field)) {
            throw new InvalidArgumentException('Field must be a string');
        }
        if (!function_exists('wp_nonce_field')) {
            throw new Exception('Wordpress instance not found');
        }
        return wp_nonce_field($action, $field);
    }
    /**
     * ajax verify nonce .
     *
     * @param string $action The action the auth refers to.
     * @param string $field  The Nonce field.
     *
     * @return mixed
     */
    public function ajaxVerifyNonce($action, $field) 
    {
        if (!is_string($action)) {
            throw new InvalidArgumentException('Action must be a string');
        }
        if (!is_string($field)) {
            throw new InvalidArgumentException('Field must be a string');
        }
        if (!function_exists('check_ajax_referer')) {
            throw new Exception('Wordpress instance not found');
        }
        return check_ajax_referer($field, $action);
    }
    /**
     * Verifies an action is authorized.
     *
     * @param string $nonce      Nonce value
     * @param string $actionname Action Name
     *
     * @return mixed
     */
    public function verifyNonce($nonce, $actionname) 
    {
        if (!function_exists('wp_verify_nonce')) {
            throw new Exception('Wordpress instance not found');
        }
        return wp_verify_nonce($nonce, $actionname);
    }
    /**
     * Create nonce url.
     *
     * @param string $actionurl The action url refers to.
     * @param string $action    The action nonce refers to.
     * @param string $name      The Nonce name.
     *
     * @return mixed
     */
    public function createNonceUrl( $actionurl, $action, $name ) 
    {
        if (!is_string($actionurl)) {
            throw new InvalidArgumentException('Action url must be a string');
        }
        if (!is_string($action)) {
            throw new InvalidArgumentException('Action must be a string');
        }
        if (!is_string($name)) {
            throw new InvalidArgumentException('Name must be a string');
        }
        if (!function_exists('wp_nonce_url')) {
            throw new Exception('Wordpress instance not found');
        }
        return wp_nonce_url($actionurl, $action, $name);
    }
}
