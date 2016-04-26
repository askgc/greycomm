//
//  homepageView.swift
//  askgcApp
//
//  Created by Steve Jean on 4/25/16.
//  Copyright © 2016 Loyola Unversity Maryland. All rights reserved.
//

import UIKit

class homepageView: UIViewController, UIWebViewDelegate{
    
    
    @IBOutlet weak var home: UIWebView!
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
    
        let url = NSURL(string: "http://www.cs.loyola.edu/~sjean/askgcApp/homepage.php")
        
        let request = NSURLRequest(URL: url!)
        

            
        home.loadRequest(request)
    }
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
    }
    
    @IBAction func back(sender: AnyObject) {
        
        home.goBack()
    }
    
    
    @IBAction func refresh(sender:AnyObject) {
        
        home.reload()
    }
    
    
    
    
}
