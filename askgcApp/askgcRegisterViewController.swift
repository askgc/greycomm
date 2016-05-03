//
//  askgcRegisterViewController.swift
//  askgcApp
//
//  Created by Steve Jean on 4/24/16.
//  Copyright © 2016 Loyola Unversity Maryland. All rights reserved.
//

import UIKit

class ResigterScreenViewController: UIViewController, UIPickerViewDataSource,UIPickerViewDelegate{

    //link the textfields to the variables
    
    @IBOutlet weak var securityquestion1: UITextField!
    
    
    @IBOutlet weak var securityquestion2: UITextField!
    
    //create the questions lists
    
   
    let questions1 = ["What is your mother's maiden name?", "What was your first concert?", "What was the name of your first school?"]
    
    let questions2 = ["What was the name of your first pet?", "What was the name of the first street you lived on?", "Where was the first place you worked?"];
    
    var question1picker = UIPickerView()
    
    var question2picker = UIPickerView()
    
    
    //form data
    
    @IBOutlet weak var fname: UITextField!
    
    @IBOutlet weak var lname: UITextField!
    
    @IBOutlet weak var userEmail: UITextField!
    
    @IBOutlet weak var confirmUserEmail: UITextField!
    
    @IBOutlet weak var password: UITextField!
    
    @IBOutlet weak var confirmpassword: UITextField!
    
    @IBOutlet weak var answer1: UITextField!
    
    @IBOutlet weak var answer2: UITextField!
    
    func doneFunc(sender: UIBarButtonItem){
        self.view.endEditing(true)
    }
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        //default the textfield to equal to the first items in the list
        
        securityquestion1.text = questions1[0]
        
        securityquestion2.text = questions2[0]
        
        // Do any additional setup after loading the view.
        
        
        question1picker.showsSelectionIndicator = true
        
        question1picker.dataSource = self
        
        question1picker.delegate = self
        
        question2picker.showsSelectionIndicator = true
        
        question2picker.dataSource = self
        
        question2picker.delegate = self
        
        //make the textfield become pickerviews
        
        securityquestion1.inputView = question1picker
    
        securityquestion2.inputView = question2picker
        
        let toolBar = UIToolbar()
        
        toolBar.barStyle = UIBarStyle.Default
        
        toolBar.translucent = true
        
        toolBar.tintColor = UIColor(red: 76/255, green: 217/255, blue: 100/255, alpha: 1)
        toolBar.sizeToFit()
        
        let doneButton = UIBarButtonItem(title: "Done", style: UIBarButtonItemStyle.Bordered, target: self, action: "doneFunc:")
        
        toolBar.setItems([doneButton], animated: false)
        toolBar.userInteractionEnabled = true
        
        securityquestion1.inputAccessoryView = toolBar
        
        securityquestion2.inputAccessoryView = toolBar
        
        
    }
    
    override func didReceiveMemoryWarning() {
        super.didReceiveMemoryWarning()
        // Dispose of any resources that can be recreated.
    }
    
    //return the number of each pickeview
    
    func numberOfComponentsInPickerView(pickerView: UIPickerView) -> Int {
        return 1
    }
    
    //return the count of each pickerview based on the questions list
    
    func pickerView(pickerView: UIPickerView, numberOfRowsInComponent component: Int) -> Int {
        
        if(pickerView == question1picker){
            return questions1.count
            
        }
        
        else if (pickerView == question2picker){
            return questions2.count
        }
        
        return 1;
    }
    
    
    //return the item of each pickerview
    
    func pickerView(pickerView: UIPickerView, titleForRow row: Int, forComponent component: Int) -> String? {
        
        if(pickerView == question1picker){
            
               return questions1[row]
        }
        
        else if (pickerView == question2picker){
         
                return questions2[row]
        }
        
        else{
            return " "
        }
    
    
    }
    
    //set the text equal to the item selected
    
    func pickerView(pickerView: UIPickerView, didSelectRow row: Int, inComponent component: Int) {
        
        if(pickerView == question1picker){
            securityquestion1.text = questions1[row]
        }
        else if (pickerView == question2picker){
            securityquestion2.text = questions2[row]
        }
        
        
    }
    
    //Handles the registering of a new user
    @IBAction func getStarted(sender: AnyObject)
    {
        
        let myUrl = NSURL(string: "http://www.cs.loyola.edu/~sjean/askgcApp/register.php")
        
        let request = NSMutableURLRequest(URL:myUrl!)
        
        request.HTTPMethod = "POST"
        
        let postInfo = "first=\(fname.text!)&last=\(lname.text!)&username=\(userEmail.text!)&confirmusername=\(confirmUserEmail.text!)&password=\(password.text!)&confirmpassword=\(confirmpassword.text!)&question1=\(securityquestion1.text!)&answer1=\(answer1.text!)&question2=\(securityquestion2.text!)&answer2=\(answer2.text!)"
        
        
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
                
                
            let alertController = UIAlertController (title:"Sign Up", message: getdata as! String, preferredStyle: UIAlertControllerStyle.Alert)
            
            alertController.addAction(UIAlertAction(title: "Dismiss", style: UIAlertActionStyle.Default, handler:
            {   (action: UIAlertAction!) in
            
               
            
        

                let check = "Registration successful, check your email to activate your account."
                
               
                    //checks if the registration successfully hppend and redirects the user to the log in page
                    if(getdata!.isEqual(check))
                    {
                        let storyBoard : UIStoryboard = UIStoryboard(name: "Main", bundle: nil)
                    
                        let nextViewController = storyBoard.instantiateViewControllerWithIdentifier("askgcLoginViewController") as! askgcLoginViewController
                        self.presentViewController(nextViewController, animated: true, completion: nil)
                    }
            }))
                
                 self.presentViewController(alertController, animated: true, completion: nil)
                
        }
    }
    
    
    getInfo.resume()

}

    

    
    /*
     // MARK: - Navigation
     
     // In a storyboard-based application, you will often want to do a little preparation before navigation
     override func prepareForSegue(segue: UIStoryboardSegue, sender: AnyObject?) {
     // Get the new view controller using segue.destinationViewController.
     // Pass the selected object to the new view controller.
     }
     */
    
}

