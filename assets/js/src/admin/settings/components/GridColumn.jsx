import { css } from '@emotion/css';

export function GridColumn({ size, children }) {
    return (
        <div className={css`
            flex: 0 0 ${size / 12 * 100}%;
            max-width: ${size / 12 * 100}%;
            padding-left: 15px;
            padding-right: 15px;
        `}>
            {children}
        </div>
    );
}