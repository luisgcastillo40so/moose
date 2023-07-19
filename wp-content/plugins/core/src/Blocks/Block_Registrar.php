<?php declare(strict_types=1);

namespace Tribe\Plugin\Blocks;

class Block_Registrar {

	public const BLOCKS_DIR = 'dist/blocks/';

	public function register( string $block_name, string $blocks_dir = self::BLOCKS_DIR ): void {
		$args = [];

		if ( ! str_contains( $block_name, 'tribe' ) ) {
			$args = [
				'render_callback' => [ $this, 'render_template' ],
			];
		}

		register_block_type(
			trailingslashit( get_stylesheet_directory() ) . $blocks_dir . $block_name . '/block.json',
			$args
		);
	}

	/**
	 * @param array $args
	 */
	public function render_template( array $args ): void {
		$template = $args['render_template'];
		$path     = str_replace( 'dist/blocks/', 'blocks/', $args['path'] );

		if ( ! file_exists( "$path/$template" ) ) {
			return;
		}

		include "$path/$template"; // phpcs:ignore WordPressVIPMinimum.Files.IncludingFile.NotAbsolutePath
	}

}
