import { css } from '@emotion/css';

export function GridRow({ children }) {
    return (
        <div className={css`
            display: flex;
            flex-wrap: wrap;
            margin-left: -15px;
            margin-right: -15px;
        `}>
            {children}
        </div>
    );
}