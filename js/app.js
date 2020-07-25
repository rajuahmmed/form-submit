( function( $ ) {
    $(document).ready( function () {
        $('#entry-list').DataTable( {
            responsive: true,
        } );
        $('.select2').select2();
    } );

    $( '.entry-form' ).on( 'submit', function( e ) {
        e.preventDefault();
        var $this = $( this ),
            formData = $this.serialize(),
            inputs = $this.find( 'input,select,textarea' ),
            btn = $this.find( 'button[type=submit]' );

        if ( $this.find( '.input-error' ).length ) {
            return;
        }

        inputs.prop( 'disabled', true );
        btn.prop( 'disabled', true );
        btn.text( 'Adding...' );

        $( '.alert' ).remove();

        $.ajax( {
            url: site_url + 'add',
            method: 'POST',
            data: formData + '&ajax=1',
        } ).done( function( data ) {
            if ( data.success ) {
                $( '<div class="alert success">' + data.messages.join( '<br>' ) + '</div>' ).insertAfter($this)
            } else {
                $( '<div class="alert error">' + data.messages.join( '<br>' ) + '</div>' ).insertAfter($this)
            }
        } ).always( function() {
            inputs.prop( 'disabled', false );
            btn.prop( 'disabled', false );
            btn.text( 'Add' )
        } );
    } );

    $( '.input-field' ).on( 'focus', function() {
        $( this ).parent().find( '.input-error' ).remove();
    } );
    $( '#name' ).on( 'blur', function() {
        var $this = $( this ),
            value = $this.val();
        if ( value.toString().trim().length === 0 ) {
            $( '<div class="input-error">Full name is Required.</div>' ).insertAfter( this );
        } else if ( ! /^[a-zA-Z0-9\s]+$/.test( value ) ) {
            $( '<div class="input-error">Full name should be letters, numbers and spaces only.</div>' ).insertAfter( this );
        } else if( value.length > 20 ) {
            $( '<div class="input-error">Full name should be under 20 characters.</div>' ).insertAfter( this );
        }
    } );
    $( '#email' ).on( 'blur', function() {
        var $this = $( this ),
            value = $this.val();
        if ( value.toString().trim().length === 0 ) {
            $( '<div class="input-error">Email is Required.</div>' ).insertAfter( this );
        } else if ( ! /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/.test( value ) ) {
            $( '<div class="input-error">Invalid email! Please enter correct email.</div>' ).insertAfter( this );
        }
    } );
    $( '#amount' ).on( 'blur', function() {
        var $this = $( this ),
            value = $this.val();
        if ( value.toString().trim().length === 0 ) {
            $( '<div class="input-error">Amount is Required.</div>' ).insertAfter( this );
        }
    } );
    $( '#receipt_id' ).on( 'blur', function() {
        var $this = $( this ),
            value = $this.val();
        if ( value.toString().trim().length === 0 ) {
            $( '<div class="input-error">Receipt ID is Required.</div>' ).insertAfter( this );
        } else if ( ! /^[a-zA-Z]+$/.test( value ) ) {
            $( '<div class="input-error">Receipt ID only accept letters.</div>' ).insertAfter( this );
        }
    } );
    $( '#city' ).on( 'blur', function() {
        var $this = $( this ),
            value = $this.val();
        if ( value.toString().trim().length === 0 ) {
            $( '<div class="input-error">City is Required.</div>' ).insertAfter( this );
        } else if ( ! /^[a-zA-Z\s]+$/.test( value ) ) {
            $( '<div class="input-error">City should contain only letters and spaces.</div>' ).insertAfter( this );
        }
    } );
    $( '#entry_by' ).on( 'blur', function() {
        var $this = $( this ),
            value = $this.val();
        if ( value.toString().trim().length === 0 ) {
            $( '<div class="input-error">Entry by is Required.</div>' ).insertAfter( this );
        }
    } );
    $( '#phone' ).on( 'blur', function() {
        var $this = $( this ),
            value = $this.val();
        if ( value.toString().trim().length <= 3 ) {
            $( '<div class="input-error">Phone by is Required.</div>' ).insertAfter( this );
        }
    } );
    $( '#note' ).on( 'blur', function() {
        var $this = $( this ),
            value = $this.val();
        if ( value.toString().trim().split(' ').length > 30 ) {
            $( '<div class="input-error">Note should be under 30 words.</div>' ).insertAfter( this );
        }
    } );

    $( '#phone' ).on( 'input', function() {
        var $this = $( this ),
            value = $this.val(),
            code = '880';
        
        if ( value.toString().indexOf( code ) !== 0 ) {
            $this.val( code );
        }
    } );
} )( jQuery );

