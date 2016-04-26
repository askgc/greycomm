//
//  forgotResetPasswordViewController.swift
//  askgcApp
//
//  Created by Steve Jean on 4/25/16.
//  Copyright © 2016 Loyola Unversity Maryland. All rights reserved.
//

import UIKit

class forgotResetPasswordViewController: UIViewController{
    
    var email:String!
   
    @IBOutlet weak var hold: UITextField!
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        // Do any additional setup after loading the view.
        
        hold.text = email;
        //print(email)
        print("here")
        
    }
    
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }

   

    
    
}
