import { createRoot } from 'react-dom/client';
import { App } from './App';

const rootElement = document.getElementById( 'bp-navigator-admin-settings' );
if ( rootElement ) {
    createRoot( rootElement ).render(
        <App />
    );
}