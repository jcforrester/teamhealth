(function( $, as3cfModal ) {

	as3cfpro.Tools = as3cfpro.Tools ? as3cfpro.Tools : {};

	/**
	 * The object that handles the copy buckets tool.
	 */
	as3cfpro.Tools.CopyBuckets = {

		/**
		 * The element which contains our modal markup.
		 *
		 * {string}
		 */
		modalContainer: '.as3cf-copy-buckets-prompt',

		/**
		 * Show the copy buckets prompt.
		 */
		showPrompt: function() {
			as3cfModal.setDismissibleState( false );
			as3cfModal.open( this.modalContainer );
		},

		/**
		 * Hide the copy buckets prompt.
		 */
		hidePrompt: function() {
			this.unsetLoadingState();

			as3cfModal.setDismissibleState( true );
			as3cfModal.close();
		},

		/**
		 * Handle prompt response.
		 *
		 * @param {object} event
		 */
		handlePromptResponse: function( event ) {
			var value = $( event.target ).data( 'copy-buckets' );

			if ( 0 === value ) {
				this.hidePrompt();

				return;
			}

			this.setLoadingState();
			this.startBackgroundTool();
		},

		/**
		 * Disable buttons and show spinner.
		 */
		setLoadingState: function() {
			as3cfModal.setLoadingState( true );

			$( this.modalContainer + ' [data-copy-buckets]' )
				.prop( 'disabled', true )
				.siblings( '.spinner' )
				.css( 'visibility', 'visible' )
				.show();
		},

		/**
		 * Enable buttons and hide spinner.
		 */
		unsetLoadingState: function() {
			as3cfModal.setLoadingState( false );

			$( this.modalContainer + ' [data-copy-buckets]' )
				.prop( 'disabled', false )
				.siblings( '.spinner' )
				.css( 'visibility', 'hidden' )
				.hide();
		},

		/**
		 * Start the background tool.
		 */
		startBackgroundTool: function() {
			var self = this;

			$.ajax( {
				url: ajaxurl,
				type: 'POST',
				dataType: 'JSON',
				data: {
					nonce: as3cfpro.nonces.tools.copy_buckets.start,
					action: 'as3cfpro_copy_buckets_start'
				},
				success: function( result ) {
					if ( result.success ) {
						as3cfpro.Tools.CopyBuckets.hidePrompt();
						as3cfpro.Tools.CopyBuckets.lockBucketSelect();
					} else {
						self.showErrorPrompt();
					}
				},
				error: function( jqXHR, textStatus, errorThrown ) {
					console.log( jqXHR, textStatus, errorThrown );
					self.showErrorPrompt();
				}
			} );
		},

		/**
		 * Show error prompt.
		 */
		showErrorPrompt: function() {
			confirm( as3cfpro.strings.tools.copy_buckets.error );
			this.unsetLoadingState();
		},

		/**
		 * Maybe show/hide bucket select.
		 */
		toggleBucketSelect: function( status ) {
			if ( status.is_queued || status.is_paused || status.is_cancelled ) {
				this.lockBucketSelect();

				return;
			}

			this.unlockBucketSelect();
		},

		/**
		 * Hide bucket select UI.
		 */
		lockBucketSelect: function() {
			$( '#as3cf-change-bucket' ).hide();
			$( '#as3cf-bucket-select-locked' ).show();
		},

		/**
 		 * Show bucket select UI.
 		 */
		unlockBucketSelect: function() {
			$( '#as3cf-change-bucket' ).show();
			$( '#as3cf-bucket-select-locked' ).hide();
		}

	};

	// Event Handlers
	$( document ).ready( function() {
		// Listen for bucket change
		$( '#tab-media' ).on( 'bucket-change', function( event, canWrite ) {
			if ( false === canWrite ) {
				return;
			}

			var uploader = as3cfpro.Sidebar.getTool( 'media', 'uploader' );

			if ( null != uploader.total_on_s3 && uploader.total_on_s3 <= 0 ) {
				return;
			}

			setTimeout( function() {
				as3cfpro.Tools.CopyBuckets.showPrompt();
			}, 300 );
		} );

		// Listen for prompt responses
		$( 'body' ).on( 'click', '.as3cf-copy-buckets-prompt [data-copy-buckets]', function( event ) {
			as3cfpro.Tools.CopyBuckets.handlePromptResponse( event );
		} );

		// Toggle bucket lock on page load
		if ( null != as3cfpro.Sidebar.tools.media.copy_buckets ) {
			as3cfpro.Tools.CopyBuckets.toggleBucketSelect( as3cfpro.Sidebar.tools.media.copy_buckets );
		}

		// Toggle bucket lock on sidebar status change
		$( '#copy_buckets' ).on( 'status-change', function( event, status ) {
			as3cfpro.Tools.CopyBuckets.toggleBucketSelect( status );
		} );
	} );

})( jQuery, as3cfModal );
