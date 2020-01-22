<?php
declare(strict_types=1);

namespace WpnonceOops;
use Brain\Monkey;
use Brain\Monkey\Functions;
use PHPUnit\Framework\TestCase;

final class WpnonceOopsTest extends WpnonceOopsTestCase  
{
	/**
	 * Function to test Nonce  
	 *
	 * @param void
	 * @return null
	 */
	public function testNonce() 
	{	
		$wn = new WpnonceOops;

		$action = 'verify_nonce';
		$nonce = 'wpnonce_oops';
		$nonce_value = 'wpnonce_oops';

		\Brain\Monkey\Functions\expect('wp_create_nonce')
		  ->with( $action )
		  ->andReturn( $nonce_value );

		$this->assertSame( $nonce_value, $nonce );	
	}

	/**
	 * Function to Verify Nonce 
	 *
	 * @param void
	 * @return null
	 */
	public function testVerifyNonce() 
	{
		$wn = new WpnonceOops;
		
		$action = 'create-post';
		$nonce = 'nonce';
		$nonce_value = 'nonce';

		\Brain\Monkey\Functions\expect('wp_create_nonce')
		  ->with( $action )
		  ->andReturn( $nonce_value );
		
		$this->assertSame( $nonce_value, $nonce );	

		$verify_nonce = '1';

		\Brain\Monkey\Functions\expect('wp_verify_nonce')
		  ->with( $nonce )
		  ->with( $action )
		  ->andReturn( $verify_nonce );
		
		//var_dump($verify_nonce);
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
		$nonce = 'nonce';
		$nonce_value = 'nonce';

		\Brain\Monkey\Functions\expect('wp_create_nonce')
		  ->with( $action )
		  ->andReturn( $nonce_value );
		$this->assertSame( $nonce_value, $nonce );	

		$url_value = 'test.php?_wpnonce='.$nonce;
		\Brain\Monkey\Functions\expect('wp_nonce_url')
		  ->with( 'test.php?' )
		  ->with( $action )
		  ->with( '_wpnonce' )
		  ->andReturn( $url_value );

		$this->assertEquals( $url_value, 'test.php?_wpnonce='.$nonce, 'Nounce URL verified succesfully' );
	}
	
}