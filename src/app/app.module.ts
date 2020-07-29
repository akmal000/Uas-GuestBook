import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { MaterialDesign } from './material/material';
import { FormsModule } from '@angular/forms'
import { HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { BukuComponent } from './buku/buku.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { TambahdataComponent } from './tambahdata/tambahdata.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    BukuComponent,
    TambahdataComponent
  ],
  entryComponents: [
    TambahdataComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    MaterialDesign,
    FormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
