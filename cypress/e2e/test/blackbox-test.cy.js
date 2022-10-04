/// <reference types="cypress" />

describe('Login dengan akun Admin', () => { 
  it('Halaman Login', () => {
      cy.visit('/');
      cy.get('img').title('logo');
      cy.get('[data-id="label-email"]').should('have.text','E-mail');
      cy.get('[data-id="label-password"]').should('have.text','Password');
      cy.get('[data-test="email"]').type('example@gmail.com');
      cy.get('[data-test="password"]').type('example');
    })
    it('Submit Login dan CRUD Fitur Supplier', () => {
      cy.visit('/');
      cy.get('[data-test="email"]').clear();
      cy.get('[data-test="password"]').clear();
      cy.get('[data-test="email"]').type('admin@gmail.com');
      cy.get('[data-test="password"]').type('password');
      cy.get('[data-test="btn-login"]').click();
      // link route supplier
      cy.get('[data-test="link-supplier"]').click();
      // add data supplier
      cy.get('[data-id="btn-addForm-supplier"]').click();
      //mengisi form supllier dan fungsi batal
      cy.get('#nama').type('Tono');
      cy.get('#telepon').type('0823456756782');
      cy.get('#alamat').type('Jl. Kencana Baru');
      cy.get('.btn-warning').click();
      //add data supplier
      cy.get('[data-id="btn-addForm-supplier"]').click();
      //mengisi form supllier dan fungsi simpan
      cy.get('#nama').type('Singgang');
      cy.get('#telepon').type('0823456756782');
      cy.get('#alamat').type('Jl. Kencana Baru');
      cy.get('.btn-primary').click();
      // edit data supplier
      cy.get('[data-id="btn-edit-supplier"]').click();
      // cy.get('#nama').type('Singgang');
      // cy.get('#telepon').type('0823456756782');
      // cy.get('#alamat').type('Jl. Kencana Baru');
      // cy.get('.btn-warning').click();
      // cy.get('[data-id="btn-addForm-supplier"]').click(); 

      // mengkosongkan form supplier
      cy.get('#nama').clear();
      cy.get('#telepon').clear();
      cy.get('#alamat').clear(); 
      //mengisi form supllier dan fungsi simpan
      cy.get('#nama').type('Galiley');
      cy.get('#telepon').type('0823456756782');
      cy.get('#alamat').type('Jl. Kencana Lama'); 
      cy.get('.btn-primary').click();
      // delete form supplier
      cy.get('[data-id="btn-delete-supplier"]').click();
    }) 

  })
  


// describe('Homepage Dashbord Admin', () => {
//     it('Halaman Dashboard', () => {
//       cy.visit('http://127.0.0.1:8000/dashboard');
//     })
//     it('Halaman Supplier', () => {
//       cy.visit('http://127.0.0.1:8000/supplier');
//       cy.get('li:nth-child(6) > a > i > .fa-truck').click()
//     })
//   })