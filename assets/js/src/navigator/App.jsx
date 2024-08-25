import { useState, useEffect, useRef } from 'react';
import { css } from '@emotion/css';
import Select from 'react-select';

import { __ } from '@wordpress/i18n';
import apiFetch from '@wordpress/api-fetch';
import { Modal, ComboboxControl } from '@wordpress/components';

export function App() {
    const [ isOpen, setIsOpen ] = useState( false );
    const openModal = () => setIsOpen( true );
    const [ selectValue, setSelectValue ] = useState('');
    const [ selectOptions, setComboBoxOptions ] = useState( beProductiveNavigator.shortcutsOptionsList );
    const [ searchInputPlaceholder, setSearchInputPlaceholder ] = useState( __('Search pages by name', 'be-productive-navigator') );

    const closeModal = () => {
        setIsOpen( false );
        setSearchInputPlaceholder( __('Search pages by name', 'be-productive-navigator') );
    }

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
        // Set the initial options for the select.
        setComboBoxOptions( beProductiveNavigator.shortcutsOptionsList);

        // Focus on the input field and set the initial placeholder value.
        let timeout;
        if (isOpen) {
            timeout = setTimeout(() => {
                const inputElement = document.querySelector('.bp-navigator-select__input');

                if (inputElement) {
                    inputElement.focus();
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

    const selectOnChangeHandler = ( selectedOption ) => {
        const value = selectedOption.value;

        if ( value === null ) {
            return false;
        }

        // Edit page.
        if ( value === 'edit:page' ) {
            setComboBoxOptions([]);
            setSearchInputPlaceholder( __( 'Enter the page name', 'bp-navigator' ) );

            const fetchPages = async () => {
                try {
                    const response = await apiFetch( {
                        path: 'wp/v2/pages?per_page=100',
                        method: 'GET',
                    } );

                    const pages = response.map( page => {
                        return {
                            label: page.title.rendered,
                            value: `${beProductiveNavigator.adminUrl}post.php?post=${page.id}&action=edit`,
                        }
                    });

                    setComboBoxOptions( pages );
                } catch (error) {
                    console.error( error );
                }    
            }
    
            fetchPages();
            
            return false;
        }

        // Edit post.
        if ( value === 'edit:post' ) {
            setComboBoxOptions([]);
            setSearchInputPlaceholder( __( 'Enter the post name', 'bp-navigator' ) );

            const fetchPosts = async () => {
                try {
                    const response = await apiFetch( {
                        path: 'wp/v2/posts?per_page=100',
                        method: 'GET',
                    } );

                    const posts = response.map( post => {
                        return {
                            label: post.title.rendered,
                            value: `${beProductiveNavigator.adminUrl}post.php?post=${post.id}&action=edit`,
                        }
                    });

                    setComboBoxOptions( posts );
                } catch (error) {
                    console.error( error );
                }    
            }
    
            fetchPosts();
            
            return false;
        }

        // Edit category.
        if ( value === 'edit:category' ) {
            setComboBoxOptions([]);
            setSearchInputPlaceholder( __( 'Enter the category name', 'bp-navigator' ) );

            const fetchCategories = async () => {
                try {
                    const response = await apiFetch( {
                        path: 'wp/v2/categories?per_page=100',
                        method: 'GET',
                    } );

                    const categories = response.map( category => {
                        return {
                            label: category.name,
                            value: `${beProductiveNavigator.adminUrl}term.php?taxonomy=category&tag_ID=${category.id}&post_type=post`,
                        }
                    });

                    setComboBoxOptions( categories );
                } catch (error) {
                    console.error( error );
                }    
            }
    
            fetchCategories();
            
            return false;
        }

        // Edit tags.
        if ( value === 'edit:tag' ) {
            setComboBoxOptions([]);
            setSearchInputPlaceholder( __( 'Enter the tag name', 'bp-navigator' ) );

            const fetchTags = async () => {
                try {
                    const response = await apiFetch( {
                        path: 'wp/v2/tags?per_page=100',
                        method: 'GET',
                    } );

                    const tags = response.map( tag => {
                        return {
                            label: tag.name,
                            value: `${beProductiveNavigator.adminUrl}term.php?taxonomy=post_tag&tag_ID=${tag.id}&post_type=post`,
                        }
                    });

                    setComboBoxOptions( tags );
                } catch (error) {
                    console.error( error );
                }    
            }
    
            fetchTags();
            
            return false;
        }

        // Edit product.
        if ( value === 'edit:product' ) {
            setComboBoxOptions([]);
            setSearchInputPlaceholder( __( 'Enter the product name', 'bp-navigator' ) );

            const fetchProducts = async () => {
                try {
                    const response = await apiFetch( {
                        path: 'wp/v2/products?per_page=100',
                        method: 'GET',
                    } );

                    const products = response.map( product => {
                        return {
                            label: product.title.rendered,
                            value: `${beProductiveNavigator.adminUrl}post.php?post=${product.id}&action=edit`,
                        }
                    });

                    setComboBoxOptions( products );
                } catch (error) {
                    console.error( error );
                }    
            }
    
            fetchProducts();
            
            return false;
        }

        // Edit menu.
        if ( value === 'edit:menu' ) {
            setComboBoxOptions([]);
            setSearchInputPlaceholder( __( 'Enter the menu name', 'bp-navigator' ) );

            const fetchMenus = async () => {
                try {
                    const response = await apiFetch( {
                        path: 'bp-navigator/v1/nav-menus',
                        method: 'GET',
                    } );

                    const menus = response.map( menu => {
                        return {
                            label: menu.name,
                            value: `${beProductiveNavigator.adminUrl}nav-menus.php?menu=${menu.id}&action=edit`,
                        }
                    });

                    setComboBoxOptions( menus );
                } catch (error) {
                    console.error( error );
                }    
            }
    
            fetchMenus();
            
            return false;
        }

        // Edit user.
        if ( value === 'edit:user' ) {
            setComboBoxOptions([]);
            setSearchInputPlaceholder( __( 'Enter the user name', 'bp-navigator' ) );

            const fetchUsers = async () => {
                try {
                    const response = await apiFetch( {
                        path: 'wp/v2/users?per_page=100',
                        method: 'GET',
                    } );

                    const users = response.map( user => {
                        return {
                            label: user.name,
                            value: `${beProductiveNavigator.adminUrl}user-edit.php?user_id=${user.id}`,
                        }
                    });

                    setComboBoxOptions( users );
                } catch (error) {
                    console.error( error );
                }    
            }
    
            fetchUsers();
            
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
                    <Select
                        className={css`
                            .bp-navigator-select__input {
                                font-size: 13px !important;
                                box-shadow: none !important;
                                min-height: 0;
                            }    
                        `}
                        classNamePrefix="bp-navigator-select"
                        styles={{
                            valueContainer: (provided) => ({
                                ...provided,
                                fontSize: '13px',
                                color: '#3c434a',
                            }),
                            menu: (provided) => ({
                                ...provided,
                                position: 'relative'
                            }),
                            option: (provided) => ({
                                ...provided,
                                fontSize: '13px',
                                color: '#3c434a',
                            })
                        }}
                        placeholder={ searchInputPlaceholder }
                        value={ `admin` }
                        onChange={ selectOnChangeHandler }
                        options={ selectOptions }
                        onInputChange={ ( inputValue, actionMeta ) => {
                            // if ( ! inputValue ) {
                            //     setComboBoxOptions([]);
                            // } else {
                            //     setComboBoxOptions( beProductiveNavigator.shortcutsOptionsList);
                            // }

                            setSelectValue( inputValue );
                        } }
                    />
                </Modal>
            ) }
        </>
    );
}