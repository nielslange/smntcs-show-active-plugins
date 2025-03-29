import { test, expect } from '@playwright/test';

test.describe( 'SMNTCS Show Active Plugins', () => {
	test.beforeEach( async ( { page } ) => {
		// Login to WordPress admin
		await page.goto( '/wp-admin' );
		await page.fill( '#user_login', 'admin' );
		await page.fill( '#user_pass', 'password' );
		await page.click( '#wp-submit' );
		await page.waitForURL( '/wp-admin/' );
	} );

	test( 'should show the active plugins page', async ( { page } ) => {
		// Navigate to Plugins menu
		await page.goto( '/wp-admin/plugins.php' );

		// Check if the "Active Plugins" submenu exists
		const activePluginsLink = page.locator(
			'a:has-text("Active Plugins")'
		);
		await expect( activePluginsLink ).toBeVisible();

		// Click the link
		await activePluginsLink.click();

		// Verify we're on the active plugins page
		await expect( page ).toHaveURL(
			'http://localhost:8888/wp-admin/plugins.php?plugin_status=active'
		);
	} );
} );
