import { Component } from '@angular/core';
import { Title } from '@angular/platform-browser';

@Component({
  selector: 'app-home-page',
  templateUrl: './home-page.component.html',
  styleUrls: ['./home-page.component.css']
})
export class HomePageComponent {
  pageData = [
    {title: "Home | Swiss Company Creation", data: "data"}
  ];

  constructor(public pageTitle: Title){
    for(let i = 0; i < this.pageData.length; i++ ){
      this.pageTitle.setTitle(this.pageData[i].title);  
    }   
  }
}
