import { useState, useEffect, useRef } from 'react';
import { css } from '@emotion/css';

import { __ } from '@wordpress/i18n';
import { Modal, ComboboxControl } from '@wordpress/components';

export function App() {
    const [ isOpen, setIsOpen ] = useState( false );
    const openModal = () => setIsOpen( true );
    const closeModal = () => setIsOpen( false );
    const [ comboBoxValue, setComboBoxValue ] = useState('');
    const [ comboBoxOptions, setComboBoxOptions ] = useState( beProductiveNavigator.shortcutsOptionsList );

    useEffect(() => {
        const keyDownHandler = ( event ) => {
            if ( event.ctrlKey && event.shiftKey && event.key === 'P' ) {
                event.preventDefault();

                openModal();
            }
        };

        window.addEventListener( 'keydown', keyDownHandler );

        return () => {
            window.removeEventListener( 'keydown', keyDownHandler );
        }
    }, []);

    useEffect(() => {
        let timeout;

        if (isOpen) {
            timeout = setTimeout(() => {
                const inputElement = document.querySelector('.components-combobox-control__input');

                if (inputElement) {
                    inputElement.focus();
                    inputElement.setAttribute('placeholder', __('Search pages by name', 'be-productive-navigator'));
                }
            }, 0);
        }

        return () => {
            if (timeout) {
                clearTimeout(timeout);
            }
        }
    }, [isOpen]);

    useEffect(() =>{
        let twoEscFlag = false;

        const keyDownHandler = ( event ) => {
            if ( event.key === 'Escape' ) {
                if ( twoEscFlag ) {
                    closeModal();
                } else {
                    twoEscFlag = true;

                    setTimeout(() => {
                        twoEscFlag = false;
                    }, 500);
                }
            }
        }

        window.addEventListener( 'keydown', keyDownHandler );

        return () => {
            window.removeEventListener( 'keydown', keyDownHandler );
        }
    }, [])

    const comboBoxOnChangeHandler = ( value ) => {
        if ( value === null ) {
            return false;
        }

        window.open(value, '_blank');
        
        closeModal();
    }

    return(
        <>
            { isOpen && (
                <Modal 
                    className={css`
                        width: 100%;
                        max-width: 600px;

                        .components-modal__content {
                            padding: 15px;
                            margin-top: 0;
                        }

                        .components-modal__header {
                            display: none;
                        }
                    `}
                    onRequestClose={ closeModal }>
                    <ComboboxControl
                        className={css`
                            .components-combobox-control__reset {
                                color: #212121;
                                background: none !important;
                            }

                            .components-form-token-field__suggestions-list {
                                max-height: 250px;
                            }

                            > div {
                                margin: 0;
                            }
                                
                        `}
                        value={ comboBoxValue }
                        onChange={ comboBoxOnChangeHandler }
                        options={ comboBoxOptions }
                        onFilterValueChange={ ( inputValue ) => {
                            if ( ! inputValue ) {
                                setComboBoxOptions([]);
                            } else {
                                setComboBoxOptions( beProductiveNavigator.shortcutsOptionsList);
                            }

                            setComboBoxValue( inputValue );
                        } }
                    />
                </Modal>
            ) }
        </>
    );
}