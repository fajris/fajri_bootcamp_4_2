import { Injectable } from '@angular/core';

@Injectable()
export class DataService {

  constructor() { }

  CourseList : object[] = [
    {'id' : 1, 'name' : 'Course one', 'sks' : 2},
    {'id' : 2, 'name' : 'Course two', 'sks' : 3},
    {'id' : 3, 'name' : 'Course three', 'sks' : 2},
    {'id' : 4, 'name' : 'Course four', 'sks' : 2},
    {'id' : 5, 'name' : 'Course five', 'sks' : 3}
  ];

}
