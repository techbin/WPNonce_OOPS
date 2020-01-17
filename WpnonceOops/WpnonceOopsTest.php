<?php
declare(strict_types=1);

namespace WpnonceOops;
use PHPUnit\Framework\TestCase;
//change the path
require('../../wp-blog-header.php');

final class WpnonceOopsTest extends TestCase  
{
	/**
	 * Function to Verify Nonce URL 
	 *
	 * @param void
	 * @return null
	 */
	public function testVerifyNonceURL() 
	{
		$wn = new WpnonceOops;
		$action = 'url-post';
		$field = 'form_generate_nonce';
		$nonce = $wn->generateNonce($action);
		$actionurl = 'test.php?';
		$url = $wn->createNonceUrl( $actionurl, $action, '_wpnonce' );
		$this->assertEquals( $url, 'test.php?_wpnonce='.$nonce, 'Nounce URL verified succesfully' );
	}
	/**
	 * Function to Verify Nonce Field
	 *
	 * @param void
	 * @return null
	 */
	public function testVerifyNonceField() 
	{
		$wn = new WpnonceOops;
		$action = 'create-post';
		$fieldname = 'form_generate_nonce';
		$nonce = $wn->generateNonce($action);
		$verify_nonce =  $wn->verifyNonce( $nonce, $action);
		if($verify_nonce == 1)
		{
			$this->assertTrue(true, 'Nonce is less than 12 hours old - Field verified succesfully.');
		}
		else if($verify_nonce == 2)
		{
			$this->assertTrue(true, 'Nonce is between 12 and 24 hours old - Field verified succesfully.');
		}
		else
		{
			$this->markTestIncomplete( 'Nonce is invalid.' );
		}
	}
}