import { useState } from 'react';

import { __ } from '@wordpress/i18n';
import { RadioControl } from '@wordpress/components';

export function GeneralSettings() {
    const [ value, setValue ] = useState( 'admin-front' );

    return (
        <>
            <h3>{ __( 'Command Pallete', 'bp-navigator' ) }</h3>
            <RadioControl
                label={ __( 'Display conditions', 'bp-navigator' ) }
                help={ __( 'Controls where the command pallete should be available to use.', 'bp-navigator' ) }
                selected={ value }
                options={[
                    { label: __( 'Admin', 'bp-navigator' ), value: 'admin' },
                    { label: __( 'Front', 'bp-navigator' ), value: 'front' },
                    { label: __( 'Admin and Front', 'bp-navigator' ), value: 'admin-front' },
                ]}
                onChange={ setValue }
            />
        </>
    );
}