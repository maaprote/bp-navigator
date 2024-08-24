import { createRoot } from 'react-dom/client';
import { App } from './App';

const rootElement = document.getElementById( 'bp-navigator-app' );
if ( rootElement ) {
	createRoot( rootElement ).render( 
        <App />
    );
}