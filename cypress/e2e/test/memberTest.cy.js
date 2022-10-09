/// <reference types="cypress" />

describe('Login with Admin Account', () => { 
  it('Login Page Can Be Open and have correct specifications', () => {
      cy.visit('/');
      cy.get('img').title('logo');
      cy.get('[data-id="label-email"]').should('have.text','E-mail');
      cy.get('[data-id="label-password"]').should('have.text','Password');
      cy.get('[data-test="email"]').type('example@gmail.com');
      cy.get('[data-test="password"]').type('example');
    })
    it('Login Submit and Test CRUD Member Feature', () => {
        cy.visit('/');
        cy.get('[data-test="email"]').clear();
        cy.get('[data-test="password"]').clear();
        cy.get('[data-test="email"]').type('admin@gmail.com');
        cy.get('[data-test="password"]').type('password');
        cy.get('[data-test="btn-login"]').click();
        // Member route link
        cy.get('[data-test="link-member"]').click();
        // add data Member
        cy.get('[data-id="btn-addForm-member"]').click();
        cy.get('[data-id="btn-cetak-member"]').should('have.text',' Cetak Member');
        //Add data form and cancel feature
        cy.get('#nama').type('Gentan');
        cy.get('#telepon').type('081555923221');
        cy.get('#alamat').type('BLITAR');
        cy.get('.btn-warning').click();
        //add data Member
        cy.get('[data-id="btn-addForm-member"]').click();
        //Add data form and save feature
        cy.get('#nama').type('Gentan Ali');
        cy.get('#telepon').type('081555923224');
        cy.get('#alamat').type('MALANG');
        cy.get('.btn-primary').click();
        // edit data member
        cy.get('[data-id="btn-edit-member"]').click(); 


  
        // Empty Form Member
        cy.get('#nama').clear();
        cy.get('#telepon').clear();
        cy.get('#alamat').clear(); 
        //Add data form and save feature
        cy.get('#nama').type('Muh. Irfan');
        cy.get('#telepon').type('081555923226');
        cy.get('#alamat').type('KEDIRI'); 
        cy.get('.btn-primary').click();
        // delete form member
        cy.get('[data-id="btn-delete-member"]').click();
      }) 
  
    })