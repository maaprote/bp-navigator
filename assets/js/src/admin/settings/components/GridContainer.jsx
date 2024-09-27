import { css } from '@emotion/css';

export function GridContainer({ children }) {
    return (
        <div 
            className={css`
                width: 100%;
                max-width: 1140px;
            `}
        >
            {children}
        </div>
    );
}