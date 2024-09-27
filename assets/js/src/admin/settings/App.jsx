import { css } from '@emotion/css';

import { __ } from '@wordpress/i18n';
import { Card, CardHeader, CardBody } from '@wordpress/components';
import { GridContainer } from './components/GridContainer';
import { GridRow } from './components/GridRow';
import { GridColumn } from './components/GridColumn';
import { GeneralSettings } from './components/GeneralSettings';

export function App() {
    return (
        <>
            <div className={css`
                * {
                    box-sizing: border-box;
                }
            `}>
                <GridContainer>
                    <GridRow>
                        <GridColumn size={9}>
                            <Card>
                                <CardHeader>
                                    <h2>{ __( 'Settings', 'bp-navigator' ) }</h2>
                                </CardHeader>
                                <CardBody>
                                    <GeneralSettings />
                                </CardBody>
                            </Card>
                        </GridColumn>
                    </GridRow>
                </GridContainer>
            </div>
        </>
    );
}