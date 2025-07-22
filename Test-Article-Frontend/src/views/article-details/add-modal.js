import React, {useEffect, useState} from 'react'
import {
  Modal,
  ModalHeader,
  ModalBody,
  ModalFooter,
  Form,
  Button,
  Container,
  Row,
  Col,
  Input,
  FormGroup, Label
} from 'reactstrap'
import _ from 'lodash'
import {Controller, useForm} from "react-hook-form"
import classnames from "classnames"
import {API} from "../../utility/Utils"
import {_storeNewArticle, _storeNewComment} from "../../redux/actions/auth"
//******************  ******************//
//******************  ******************//
const AddItemModal = (props) => {
  //******************  ******************//
  const {articleId} = props
  //******************  ******************//
  const [open, setOpen] = useState(true)
  const [loading, setLoading] = useState(false)
  //******************  ******************//
  const _close = () => {
    setOpen(false)
    props.onClose()
  }
  //******************  ******************//
  const {handleSubmit, control, errors} = useForm()
  //******************  ******************//
  const onSubmit = (data) => {
    setLoading(true)
    _storeNewComment(
      data,
      () => {
        props.onSuccessCallback()
        _close()
      },
      () => setLoading(false)
    )
  }
  //******************  ******************//
  return (
    <Modal
      scrollable={true}
      isOpen={open}
      toggle={_close}
      unmountOnClose={true}
      backdrop={true}
      className='modal-lg modal-dialog-centered'
      modalClassName={''}
    >
      <ModalHeader>
        Add Comment
      </ModalHeader>
      <ModalBody>
        <Form className='flex-grow-1 d-flex flex-column'>
          <Container>
            <Row>
              <Col xs={12}>
                <FormGroup>
                  <Label for={'content'}>Message</Label>
                  <Controller
                    control={control}
                    name={'content'}
                    as={Input}
                    type={'text'}
                    className={classnames({'is-invalid': _.get(errors, 'content')})}
                    rules={{
                      required: true
                    }}
                    defaultValue={''}
                  />
                  <Controller
                    control={control}
                    name={'article_id'}
                    as={Input}
                    type={'hidden'}
                    className={classnames({'is-invalid': _.get(errors, 'article_id')})}
                    rules={{
                      required: true
                    }}
                    defaultValue={articleId}
                  />
                </FormGroup>
              </Col>
              <Col xs={12}>
                <FormGroup>
                  <Label for={'title'}>Author</Label>
                  <Controller
                    control={control}
                    name={'author_name'}
                    as={Input}
                    type={'text'}
                    className={classnames({'is-invalid': _.get(errors, 'author_name')})}
                    rules={{
                      required: true
                    }}
                    defaultValue={''}
                  />
                </FormGroup>
              </Col>
            </Row>
          </Container>
        </Form>
      </ModalBody>
      <ModalFooter>
        <Button type='button' color='flat-secondary' disabled={loading} onClick={_close}>
          <span>Cancel</span>
        </Button>
        <Button type='submit' color='primary' disabled={loading} onClick={handleSubmit(onSubmit)}>
          <span>Save</span>
        </Button>
      </ModalFooter>
    </Modal>
  )
}
//******************  ******************//
export default AddItemModal
