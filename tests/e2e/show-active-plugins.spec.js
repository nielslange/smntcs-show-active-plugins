/**
 * The plugin adds Plugins → Active Plugins, a shortcut to the plugins list filtered to active plugins, and marks it
 * as the current submenu item there.
 */
import { test, expect } from '@wordpress/e2e-test-utils-playwright';

test.describe( 'Show Active Plugins', () => {
	test( 'adds Active Plugins to the Plugins menu', async ( { page } ) => {
		await page.goto( '/wp-admin/' );
		const link = page
			.locator( '#menu-plugins .wp-submenu' )
			.getByRole( 'link', { name: 'Active Plugins' } );
		await expect( link ).toHaveAttribute(
			'href',
			'plugins.php?plugin_status=active'
		);
	} );

	test( 'opens the active plugins list and marks it as current', async ( {
		page,
	} ) => {
		await page.goto( '/wp-admin/plugins.php' );
		await page
			.locator( '#menu-plugins .wp-submenu' )
			.getByRole( 'link', { name: 'Active Plugins' } )
			.click();

		await expect( page ).toHaveURL( /plugins\.php\?plugin_status=active$/ );
		await expect( page.locator( '.subsubsub .active a.current' ) ).toBeVisible();
		const submenu = page.locator( '#menu-plugins .wp-submenu' );
		await expect(
			submenu.locator( 'li.current a[href="plugins.php?plugin_status=active"]' )
		).toBeVisible();
		await expect(
			submenu.locator( 'li.current a[href="plugins.php"]' )
		).toHaveCount( 0 );
	} );
} );
