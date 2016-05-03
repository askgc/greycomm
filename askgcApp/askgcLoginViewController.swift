//
//  askgcLoginViewController.swift
//  askgcApp
//
//  Created by Steve Jean on 4/22/16.
//  Copyright © 2016 Loyola Unversity Maryland. All rights reserved.
//

import UIKit

class askgcLoginViewController: UIViewController {

    @IBOutlet weak var username: UITextField!
    
    @IBOutlet weak var password: UITextField!
    
    override func viewDidLoad() {
        super.viewDidLoad()

        // Do any additional setup after loading the view.
    }

    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    
    
    @IBAction func LOGIN(sender: UIButton) {
        
        
        let myUrl = NSURL(string: "http://www.cs.loyola.edu/~sjean/askgcApp/login.php")
        
        let request = NSMutableURLRequest(URL:myUrl!)
        
        request.HTTPMethod = "POST"
        
        let postInfo = "&username=\(username.text!)&password=\(password.text!)"
        
        
        request.HTTPBody = postInfo.dataUsingEncoding(NSUTF8StringEncoding)
        
        let getInfo = NSURLSession.sharedSession().dataTaskWithRequest(request)
        {
            data, response, error in
            
            if error != nil{
                
                print("error=\(error)")
                return
                
            }
            
           
            
            let getdata = NSString(data: data!, encoding: NSUTF8StringEncoding)
            NSOperationQueue.mainQueue().addOperationWithBlock{
                
                
                let alertController = UIAlertController (title:"Login", message: getdata as! String, preferredStyle: UIAlertControllerStyle.Alert)
                
                alertController.addAction(UIAlertAction(title: "Dismiss", style: UIAlertActionStyle.Default, handler:
                    {   (action: UIAlertAction!) in
                        
                        
                        
                        
                        
                        let check = "Login successful"
                        
                        
                        //checks that the php script cofirms that a user has successfully logged in
                        if(getdata!.isEqual(check))
                        {
                            let storyBoard : UIStoryboard = UIStoryboard(name: "Main", bundle: nil)
                            
                            let nextViewController = storyBoard.instantiateViewControllerWithIdentifier("homepageView") as! homepageView
                            self.presentViewController(nextViewController, animated: true, completion: nil)
                        }
                }))
                
                self.presentViewController(alertController, animated: true, completion: nil)
                
            }
        }
        
        
        getInfo.resume()

        
    }
   /*
    {
    
     
    

}
*/
    /*
    // MARK: - Navigation

    // In a storyboard-based application, you will often want to do a little preparation before navigation
    override func prepareForSegue(segue: UIStoryboardSegue, sender: AnyObject?) {
        // Get the new view controller using segue.destinationViewController.
        // Pass the selected object to the new view controller.
    }
    */

}
