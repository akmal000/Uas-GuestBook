import { Component, OnInit } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { TambahdataComponent } from '../tambahdata/tambahdata.component';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-buku',
  templateUrl: './buku.component.html',
  styleUrls: ['./buku.component.css']
})
export class BukuComponent implements OnInit {

  constructor(
    public dialog: MatDialog,
    public api: ApiService
  ) { 
    this.getData()
  }

  buku: any = []
  getData() {
    this.api.baca().subscribe(res => {
      this.buku = res;
    })
  }

  ngOnInit(): void {
  }
  buatKegiatan() {
    const dialogRef = this.dialog.open(TambahdataComponent, {
      width: '450px',
    });
    dialogRef.afterClosed().subscribe(result => {
      console.log('Dialog ditutup');
    });
  }


}
